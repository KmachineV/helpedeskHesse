<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTicketRequest;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\MediaTicket;
use App\Priority;
use App\Status;
use App\Ticket;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

class TicketsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {


            $user = auth()->user();

            $query = Ticket::with(['status', 'priority', 'category' ,'comments', 'employee'])
                ->filterTickets($request)
                ->select(sprintf('%s.*', (new Ticket)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'ticket_show';
                $editGate      = 'ticket_edit';
                $deleteGate    = 'ticket_delete';
                $crudRoutePart = 'tickets';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : "";
            });
            $table->addColumn('status_name', function ($row) {
                return $row->status ? $row->status->name : '';
            });
            $table->addColumn('status_color', function ($row) {
                return $row->status ? $row->status->color : '#000000';
            });

            $table->addColumn('priority_name', function ($row) {
                return $row->priority ? $row->priority->name : '';
            });
            $table->addColumn('priority_color', function ($row) {
                return $row->priority ? $row->priority->color : '#000000';
            });

            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });
            $table->addColumn('category_color', function ($row) {
                return $row->category ? $row->category->color : '#000000';
            });

            $table->editColumn('author_name', function ($row) {
                return $row->author_name ? $row->author_name : "";
            });
            $table->editColumn('author_email', function ($row) {
                return $row->author_email ? $row->author_email : "";
            });
            $table->addColumn('employee_id', function ($row) {
                return $row->employee_id ? $row->employee_id : '';
            });

            $table->addColumn('comments_count', function ($row) {
                return $row->comments->count();
            });

            $table->addColumn('view_link', function ($row) {
                return route('admin.tickets.show', $row->id);
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'priority', 'category', 'employee_id']);

            return $table->make(true);
        }

        $priorities = Priority::all();
        $statuses = Status::all();
        $categories = Category::all();

        return view('admin.tickets.index', compact('priorities', 'statuses', 'categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('ticket_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = auth()->user();


        $statuses = Status::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $priorities = Priority::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');





        return view('admin.tickets.create', compact('statuses', 'priorities', 'categories', 'user'));
    }

    public function store(StoreTicketRequest $request)
    {


        $ticket = Ticket::create($request->all());



        if($request->hasFile('attachments')){

            $images = $request->file('attachments');

            foreach ($images as $image){
                $name = time().'_'.$image->getClientOriginalName();

                $rute = public_path(). '/images';

                $image->move($rute, $name);

                $urlImage= '/images/'.$name;

                MediaTicket::create([
                    'url' => $urlImage,
                    'ticket_id' => $ticket->id
            ]);

            }

        }


        return redirect()->route('admin.tickets.index')->with('status', 'El ticket se ha creado exitosamente');
    }

    public function edit(Ticket $ticket)
    {
        abort_if(Gate::denies('ticket_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = Status::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $priorities = Priority::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employees = Employee::all();



        $ticket->load('status', 'priority', 'category', 'users', 'employee');





        return view('admin.tickets.edit', compact('statuses', 'priorities', 'categories', 'ticket', 'employees'));
    }

    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->all());

        if (count($ticket->attachments) > 0) {
            foreach ($ticket->attachments as $media) {
                if (!in_array($media->file_name, $request->input('attachments', []))) {
                    $media->delete();
                }
            }
        }

        $media = $ticket->attachments->pluck('file_name')->toArray();

        foreach ($request->input('attachments', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $ticket->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('admin.tickets.index');
    }

    public function show(Ticket $ticket)
    {
        abort_if(Gate::denies('ticket_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ticket->load('status', 'priority', 'category', 'comments', 'employee', 'users');

        $images = DB::table('MediaTicket')->where('ticket_id','=',$ticket->getQueueableId())->get();



        $houseHold = DB::table('households')->where('households.user_id','=',$ticket->user_id)->get()->first();

        $users = DB::table('users')
            ->join('projects','users.projectid','=','projects.id')
            ->join('regions','projects.region_id', "=",'regions.id' )
            ->join('provinces', 'projects.province_id',"=",'provinces.id')
            ->join('communes','projects.commune_id',"=",'communes.id')
            ->where('users.id', '=', $ticket->user_id)->get()->first();

        $comments = DB::table('comments')
            ->where('user_id', '=', $ticket->user_id)->get();


        return view('admin.tickets.show', compact('ticket', 'houseHold', 'users', 'images', 'comments' ));
    }

    public function destroy(Ticket $ticket)
    {
        abort_if(Gate::denies('ticket_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ticket->delete();

        return back();
    }

    public function massDestroy(MassDestroyTicketRequest $request)
    {
        Ticket::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function pdf(Ticket $ticket)
    {

        abort_if(Gate::denies('ticket_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');



        $ticket->load('status', 'priority', 'category', 'comments', 'employee', 'users');

        $houseHold = DB::table('households')
            ->where('households.user_id','=',$ticket->user_id)->get()->first();

        $users = DB::table('users')
            ->join('projects','users.projectid','=','projects.id')
            ->join('regions','projects.region_id', "=",'regions.id' )
            ->join('provinces', 'projects.province_id',"=",'provinces.id')
            ->join('communes','projects.commune_id',"=",'communes.id')
            ->where('users.id', '=', $ticket->user_id)->get()->first();



        $pdf = PDF::loadView('admin.tickets.ticket_pdf', ['ticket' => $ticket, 'users' => $users, 'houseHold' => $houseHold] );

        return $pdf->stream();

    }

    public function storeComment(Request $request, Ticket $ticket)
    {
        $request->validate([
            'comment_text' => 'required'
        ]);
        $user = auth()->user();
        $comment = $ticket->comments()->create([
            'author_name'   => $user->name,
            'author_email'  => $user->email,
            'user_id'       => $user->id,
            'comment_text'  => $request->comment_text
        ]);

        $ticket->sendCommentNotification($comment);

        return redirect()->back()->withStatus('Tu comentario se ha enviado con exito');
    }
}
