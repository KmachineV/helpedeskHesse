<?php

return [
    'userManagement' => [
        'title'          => 'Administracion',
        'title_singular' => 'User management',
    ],
    'permission'     => [
        'title'          => 'Permisos',
        'title_singular' => 'Permisos',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Nombre',
            'title_helper'      => '',
            'created_at'        => 'Creado el',
            'created_at_helper' => '',
            'updated_at'        => 'Actualizado el',
            'updated_at_helper' => '',
            'deleted_at'        => 'Borrado el',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Nombre',
            'title_helper'       => '',
            'permissions'        => 'Permisos',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Usuarios',
        'title_singular' => 'Usuario',
        'user_upload'    => 'Carga masiva',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'first_name'               => 'Nombre',
            'last_name'                => 'Apellido',
            'rut'                      => 'Rut',
            'project_id'                  => 'Proyecto',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email confirmado el',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'status'         => [
        'title'          => 'Estado Ticket',
        'title_singular' => 'Estado',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Nombre',
            'name_helper'       => '',
            'color'             => 'Color',
            'color_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'priority'       => [
        'title'          => 'Prioridades',
        'title_singular' => 'Prioridad',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Nombre',
            'name_helper'       => '',
            'color'             => 'Color',
            'color_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'category'       => [
        'title'          => 'Categorías',
        'title_singular' => 'Categoría',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Nombre',
            'name_helper'       => '',
            'color'             => 'Color',
            'color_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'ticket'         => [
        'title'          => 'Tickets',
        'title_singular' => 'Ticket',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => '',
            'title'                   => 'Titulo',
            'title_helper'            => '',
            'content'                 => 'Contenido',
            'content_helper'          => '',
            'status'                  => 'Estado',
            'status_helper'           => '',
            'priority'                => 'Prioridad',
            'priority_helper'         => '',
            'category'                => 'Categoria',
            'category_helper'         => '',
            'author_name'             => 'Nombre creador',
            'author_name_helper'      => '',
            'author_email'            => 'Email creador',
            'author_email_helper'     => '',
            'assigned_to_user'        => 'Asignado al trabajador',
            'assigned_to_user_helper' => '',
            'comments'                => 'Comentarios',
            'comments_helper'         => '',
            'created_at'              => 'Fecha de creacion',
            'created_at_helper'       => '',
            'updated_at'              => 'Actualizado el',
            'updated_at_helper'       => '',
            'deleted_at'              => 'Borrado el',
            'deleted_at_helper'       => '',
            'attachments'             => 'Documentos',
            'attachments_helper'      => '',
        ],
    ],
    'comment'        => [
        'title'          => 'Comentarios',
        'title_singular' => 'Comentario',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'ticket'              => 'Ticket',
            'ticket_helper'       => '',
            'author_name'         => 'Nombre creador',
            'author_name_helper'  => '',
            'author_email'        => 'Email creador',
            'author_email_helper' => '',
            'user'                => 'Usuario',
            'user_helper'         => '',
            'comment_text'        => 'Comentario',
            'comment_text_helper' => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => '',
        ],
    ],
    'auditLog'       => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'description'         => 'Descripcion',
            'description_helper'  => '',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => '',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => '',
            'user_id'             => 'User ID',
            'user_id_helper'      => '',
            'properties'          => 'Properties',
            'properties_helper'   => '',
            'host'                => 'Host',
            'host_helper'         => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
        ],
    ],

    'projects'       => [
        'title'          => 'Proyectos',
        'title_singular' => 'Proyecto',
        'fields'         => [
            'id'                  => 'ID',
            'code'                => 'Código',
            'name'                => 'Nombre',
            'commune'             => 'Comuna',
            'Province'          => 'Provincia',
            'Region'              => 'Región',
            'start_project'        => 'Inicio del proyecto',
            'end_project' => 'Final del proyecto',
            'end_warranty'             => 'Fin de la garantia',
            'status'      => 'Estado del proyecto',
            'name_helper'       => '',
            'content_helper'          => '',
            'properties'          => 'Properties',
            'properties_helper'   => '',
            'host'                => 'Host',
            'host_helper'         => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
        ],
    ],
    'employee'       => [
        'title'          => 'Empleados',
        'title_singular' => 'Empleado',
        'fields'         => [
            'id'                  => 'ID',
            'first_name'          => 'Nombre',
            'last_name'           => 'Apellido',
            'rut'                 => 'Rut',
            'status'              => 'Estado',
            'content_helper'          => '',
        ],
    ],
    'households'       => [
        'title'          => 'Viviendas',
        'title_singular' => 'Vivienda',
        'fields'         => [
            'id'                  => 'ID',
            'user_id'             => 'Propietario',
            'address'             => 'Direccion',
            'information'         => 'Informacion',
            'name_helper'       => '',
            'content_helper'          => ''
        ],
    ],


];
