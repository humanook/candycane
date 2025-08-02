<?php
declare(strict_types=1);
/**
 *
 * @relationship ./lib/redmine/preparation.rb
 */
return [
    // Permissions
    'CandyCanePermission' => [
        'view_project' => [
            'actions' => [
                ['controller' => 'Projects', 'action' => 'show'],
                ['controller' => 'Projects', 'action' => 'activity'],
            ],
            'read' => true,
            'project_module' => null,
        ],
        'search_project' => [
            'actions' => [
                ['controller' => 'Search', 'action' => 'index'],
            ],
            'read' => true,
            'public' => true,
            'project_module' => null,
        ],
        'add_project' => [
            'actions' => [
                ['controller' => 'Projects', 'action' => 'new'],
                ['controller' => 'Projects', 'action' => 'create'],
            ],
            'require' => 'loggedin',
            'project_module' => null,
        ],
        'edit_project' => [
            'actions' => [
                ['controller' => 'Projects', 'action' => 'settings'],
                ['controller' => 'Projects', 'action' => 'edit'],
                ['controller' => 'Projects', 'action' => 'update'],
            ],
            'require' => 'member',
            'project_module' => null,
        ],
        'close_project' => [
            'actions' => [
                ['controller' => 'Projects', 'action' => 'close'],
                ['controller' => 'Projects', 'action' => 'reopen'],
            ],
            'require' => 'member',
            'read' => true,
            'project_module' => null,
        ],
        'delete_project' => [
            'actions' => [
                ['controller' => 'Projects', 'action' => 'destroy'],
            ],
            'require' => 'member',
            'read' => true,
            'project_module' => null,
        ],
        'select_project_publicity' => [
            'actions' => [
            ],
            'require' => 'member',
            'project_module' => null,
        ],
        'select_project_modules' => [
            'actions' => [
                ['controller' => 'Projects', 'action' => 'modules'],
            ],
            'require' => 'member',
            'project_module' => null,
        ],
        'view_members' => [
            'actions' => [
                ['controller' => 'Members', 'action' => 'index'],
                ['controller' => 'Members', 'action' => 'show'],
            ],
            'read' => true,
            'public' => true,
            'project_module' => null,
        ],
        'manage_members' => [
            'actions' => [
                ['controller' => 'Projects', 'action' => 'settings'],
                ['controller' => 'Members', 'action' => 'index'],
                ['controller' => 'Members', 'action' => 'show'],
                ['controller' => 'Members', 'action' => 'new'],
                ['controller' => 'Members', 'action' => 'create'],
                ['controller' => 'Members', 'action' => 'edit'],
                ['controller' => 'Members', 'action' => 'update'],
                ['controller' => 'Members', 'action' => 'destroy'],
                ['controller' => 'Members', 'action' => 'autocomplete'],
            ],
            'require' => 'member',
            'project_module' => null,
        ],
        'manage_versions' => [
            'actions' => [
                ['controller' => 'Projects', 'action' => 'settings'],
                ['controller' => 'Versions', 'action' => 'new'],
                ['controller' => 'Versions', 'action' => 'create'],
                ['controller' => 'Versions', 'action' => 'edit'],
                ['controller' => 'Versions', 'action' => 'update'],
                ['controller' => 'Versions', 'action' => 'close_completed'],
                ['controller' => 'Versions', 'action' => 'destroy'],
            ],
            'require' => 'member',
            'project_module' => null,
        ],
        'add_subprojects' => [
            'actions' => [
                ['controller' => 'Projects', 'action' => 'new'],
                ['controller' => 'Projects', 'action' => 'create'],
            ],
            'require' => 'member',
            'project_module' => null,
        ],
        // Queries
        'manage_public_queries' => [
            'actions' => [
                ['controller' => 'Queries', 'action' => 'new'],
                ['controller' => 'Queries', 'action' => 'create'],
                ['controller' => 'Queries', 'action' => 'edit'],
                ['controller' => 'Queries', 'action' => 'update'],
                ['controller' => 'Queries', 'action' => 'destroy'],
            ],
            'require' => 'member',
            'project_module' => null,
        ],
        'save_queries' => [
            'actions' => [
                ['controller' => 'Queries', 'action' => 'new'],
                ['controller' => 'Queries', 'action' => 'create'],
                ['controller' => 'Queries', 'action' => 'edit'],
                ['controller' => 'Queries', 'action' => 'update'],
                ['controller' => 'Queries', 'action' => 'destroy'],
            ],
            'require' => 'loggedin',
            'project_module' => null,
        ],
        //## issue_tracking
        'view_issues' => [
            'actions' => [
                ['controller' => 'Issues','action' => 'index'],
                ['controller' => 'Issues','action' => 'show'],
                ['controller' => 'Issues','action' => 'issue_tab'],
                ['controller' => 'auto_complete','action' => 'issues'],
                ['controller' => 'context_menus','action' => 'issues'],
                ['controller' => 'Versions','action' => 'index'],
                ['controller' => 'Versions','action' => 'show'],
                ['controller' => 'Versions','action' => 'status_by'],
                ['controller' => 'Journals','action' => 'index'],
                ['controller' => 'Journals','action' => 'diff'],
                ['controller' => 'Queries','action' => 'index'],
                ['controller' => 'Reports','action' => 'issue_report'],
                ['controller' => 'Reports','action' => 'issue_report_details'],
            ],
            'read' => true,
            'project_module' => 'issue_tracking',
        ],
        'add_issues' => [
            'actions' => [
                ['controller' => 'Issues','action' => 'new'],
                ['controller' => 'Issues','action' => 'create'],
                ['controller' => 'Attachments','action' => 'upload'],
            ],
            'project_module' => 'issue_tracking',
        ],
        'edit_issues' => [
            'actions' => [
                ['controller' => 'Issues','action' => 'edit'],
                ['controller' => 'Issues','action' => 'update'],
                ['controller' => 'Issues','action' => 'bulk_edit'],
                ['controller' => 'Issues','action' => 'bulk_update'],
                ['controller' => 'Journals','action' => 'new'],
                ['controller' => 'Attachments','action' => 'upload'],
            ],
            'project_module' => 'issue_tracking',
        ],
        'edit_own_issues' => [
            'actions' => [
                ['controller' => 'Issues','action' => 'edit'],
                ['controller' => 'Issues','action' => 'update'],
                ['controller' => 'Issues','action' => 'bulk_edit'],
                ['controller' => 'Issues','action' => 'bulk_update'],
                ['controller' => 'Journals','action' => 'new'],
                ['controller' => 'Attachments','action' => 'upload'],
            ],
            'project_module' => 'issue_tracking',
        ],
        'copy_issues' => [
            'actions' => [
                ['controller' => 'Issues','action' => 'new'],
                ['controller' => 'Issues','action' => 'create'],
                ['controller' => 'Issues','action' => 'bulk_edit'],
                ['controller' => 'Issues','action' => 'bulk_update'],
                ['controller' => 'Attachments','action' => 'upload'],
            ],
            'project_module' => 'issue_tracking',
        ],
        'manage_issue_relations' => [
            'actions' => [
                ['controller' => 'Issue_relations','action' => 'index'],
                ['controller' => 'Issue_relations','action' => 'show'],
                ['controller' => 'Issue_relations','action' => 'create'],
                ['controller' => 'Issue_relations','action' => 'destory'],
            ],
            'project_module' => 'issue_tracking',
        ],
        'manage_subtasks' => [
            'actions' => [
            ],
            'project_module' => 'issue_tracking',
        ],
        'set_issues_private' => [
            'actions' => [
            ],
            'require' => 'member',
            'project_module' => 'issue_tracking',
        ],
        'set_own_issues_private' => [
            'actions' => [
            ],
            'require' => 'loggedin',
            'project_module' => 'issue_tracking',
        ],
        'add_issue_notes' => [
            'actions' => [
                ['controller' => 'Issues','action' => 'edit'],
                ['controller' => 'Issues','action' => 'update'],
                ['controller' => 'Journals','action' => 'new'],
                ['controller' => 'Attachments','action' => 'upload'],
            ],
            'project_module' => 'issue_tracking',
        ],
        'edit_issue_notes' => [
            'actions' => [
                ['controller' => 'Journals','action' => 'edit'],
                ['controller' => 'Journals','action' => 'update'],
            ],
            'require' => 'loggedin',
            'project_module' => 'issue_tracking',
        ],
        'edit_own_issue_notes' => [
            'actions' => [
                ['controller' => 'Journals','action' => 'edit'],
                ['controller' => 'Journals','action' => 'update'],
            ],
            'require' => 'loggedin',
            'project_module' => 'issue_tracking',
        ],
        'view_private_notes' => [
            'actions' => [
            ],
            'require' => 'member',
            'read' => true,
            'project_module' => 'issue_tracking',
        ],
        'set_notes_private' => [
            'actions' => [
            ],
            'require' => 'member',
            'project_module' => 'issue_tracking',
        ],
        'delete_issues' => [
            'actions' => [
                ['controller' => 'Issue', 'action' => 'destroy'],
            ],
            'require' => 'member',
            'project_module' => 'issue_tracking',
        ],
        // Watchers
        'view_issue_watchers' => [
            'actions' => [
            ],
            'read' => true,
            'project_module' => 'issue_tracking',
        ],
        'add_issue_watchers' => [
            'actions' => [
                ['controller' => 'Watchers', 'action' => 'new'],
                ['controller' => 'Watchers', 'action' => 'create'],
                ['controller' => 'Watchers', 'action' => 'append'],
                ['controller' => 'Watchers', 'action' => 'autocomplete_for_user'],
                ['controller' => 'Watchers', 'action' => 'autocomplete_for_mention'],
            ],
            'project_module' => 'issue_tracking',
        ],
        'delete_issue_watchers' => [
            'actions' => [
                ['controller' => 'Watchers', 'action' => 'destroy'],
            ],
            'project_module' => 'issue_tracking',
        ],
        'import_issues' => [
            'project_module' => 'issue_tracking',
        ],
        // Issue categories
        'manage_categories' => [
            'actions' => [
                ['controller' => 'Projects', 'action' => 'settings'],
                ['controller' => 'issue_categories',' action' => 'index'],
                ['controller' => 'issue_categories',' action' => 'show'],
                ['controller' => 'issue_categories',' action' => 'new'],
                ['controller' => 'issue_categories',' action' => 'create'],
                ['controller' => 'issue_categories',' action' => 'edit'],
                ['controller' => 'issue_categories',' action' => 'update'],
                ['controller' => 'issue_categories', 'action' => 'destroy'],
            ],
            'require' => 'member',
            'project_module' => 'issue_tracking',
        ],
        //# time_tracking
        'view_time_entries' => [
            'actions' => [
                ['controller' => 'Timelog', 'action' => 'index'],
                ['controller' => 'Timelog', 'action' => 'report'],
                ['controller' => 'Timelog', 'action' => 'show'],
            ],
            'read' => true,
            'project_module' => 'time_tracking',
        ],
        'log_time' => [
            'actions' => [
                ['controller' => 'Timelog', 'action' => 'new'],
                ['controller' => 'Timelog', 'action' => 'create'],
            ],
            'require' => 'loggedin',
            'project_module' => 'time_tracking',
        ],
        'edit_time_entries' => [
            'actions' => [
                ['controller' => 'Timelog', 'action' => 'edit'],
                ['controller' => 'Timelog', 'action' => 'destroy'],
                ['controller' => 'Timelog', 'action' => 'bulk_edit'],
                ['controller' => 'Timelog', 'action' => 'bulk_update'],
            ],
            'require' => 'member',
            'project_module' => 'time_tracking',
        ],
        'edit_own_time_entries' => [
            'actions' => [
                ['controller' => 'Timelog', 'action' => 'update'],
                ['controller' => 'Timelog', 'action' => 'destroy'],
                ['controller' => 'Timelog', 'action' => 'bulk_edit'],
                ['controller' => 'Timelog', 'action' => 'bulk_update'],
            ],
            'require' => 'loggedin',
            'project_module' => 'time_tracking',
        ],
        'manage_project_activities' => [
            'actions' => [
                ['controller' => 'Project', 'action' => 'settings'],
                ['controller' => 'project_enumerations', 'action' => 'update'],
                ['controller' => 'project_enumerations', 'action' => 'destroy'],
            ],
            'require' => 'member',
            'project_module' => 'time_tracking',
        ],
        'log_time_for_other_users' => [
            'actions' => [
            ],
            'require' => 'member',
            'project_module' => 'time_tracking',
        ],
        'import_time_entries' => [
            'actions' => [
            ],
            'project_module' => 'time_tracking',
        ],
        //# news
        'view_news' => [
            'actions' => [
                ['controller' => 'News', 'action' => 'index'],
                ['controller' => 'News', 'action' => 'show'],
            ],
            'read' => true,
            'project_module' => 'news',
        ],
        'manage_news' => [
            'actions' => [
                ['controller' => 'News', 'action' => 'new'],
                ['controller' => 'News', 'action' => 'create'],
                ['controller' => 'News', 'action' => 'edit'],
                ['controller' => 'News', 'action' => 'update'],
                ['controller' => 'News', 'action' => 'destroy'],
                ['controller' => 'Comments', 'action' => 'destroy'],
                ['controller' => 'Attachments', 'action' => 'update'],
            ],
            'require' => 'member',
            'project_module' => 'news',
        ],
        'comment_news' => [
            'actions' => [
                ['controller' => 'Comments', 'action' => 'create'],
            ],
            'project_module' => 'news',
        ],
        //# documents
        'view_documents' => [
            'actions' => [
                ['controller' => 'Documents', 'action' => 'index'],
                ['controller' => 'Documents', 'action' => 'create'],
                ['controller' => 'Documents', 'action' => 'add_attachment'],
                ['controller' => 'Attachments', 'action' => 'update'],
            ],
            'require' => 'loggedin',
            'project_module' => 'documents',
        ],
        'add_documents' => [
            'actions' => [
                ['controller' => 'Documents', 'action' => 'new'],
                ['controller' => 'Documents', 'action' => 'create'],
                ['controller' => 'Documents', 'action' => 'add_attachment'],
                ['controller' => 'Attachments', 'action' => 'update'],
            ],
            'require' => 'loggedin',
            'project_module' => 'documents',
        ],
        'edit_documents' => [
            'actions' => [
                ['controller' => 'Documents', 'action' => 'edit'],
                ['controller' => 'Documents', 'action' => 'update'],
                ['controller' => 'Documents', 'action' => 'add_attachment'],
                ['controller' => 'Attachments', 'action' => 'update'],
            ],
            'require' => 'loggedin',
            'project_module' => 'documents',
        ],
        'delete_documents' => [
            'actions' => [
                ['controller' => 'Documents', 'action' => 'destroy'],
            ],
            'require' => 'loggedin',
            'project_module' => 'documents',
        ],
        //# files
        'view_files' => [
            'actions' => [
                ['controller' => 'Files', 'action' => 'index'],
                ['controller' => 'Versions', 'action' => 'download'],
            ],
            'read' => true,
            'project_module' => 'files',
        ],
        'manage_files' => [
            'actions' => [
                ['controller' => 'Files', 'action' => 'new'],
                ['controller' => 'Files', 'action' => 'create'],
                ['controller' => 'Attachments', 'action' => 'update'],
            ],
            'require' => 'loggedin',
            'project_module' => 'files',
        ],
        //# wiki
        'view_wiki_pages' => [
            'actions' => [
                ['controller' => 'Wiki', 'action' => 'index'],
                ['controller' => 'Wiki', 'action' => 'show'],
                ['controller' => 'Wiki', 'action' => 'special'],
                ['controller' => 'Wiki', 'action' => 'date_index'],
                ['controller' => 'auto_complete', 'action' => 'wiki_pages'],
            ],
            'read' => true,
            'project_module' => 'wiki',
        ],
        'view_wiki_edits' => [
            'actions' => [
                ['controller' => 'Wiki', 'action' => 'history'],
                ['controller' => 'Wiki', 'action' => 'diff'],
                ['controller' => 'Wiki', 'action' => 'annotate'],
            ],
            'read' => true,
            'project_module' => 'wiki',
        ],
        'export_wiki_pages' => [
            'actions' => [
                ['controller' => 'Wiki', 'action' => 'export'],
            ],
            'read' => true,
            'project_module' => 'wiki',
        ],
        'edit_wiki_pages' => [
            'actions' => [
                ['controller' => 'Wiki', 'action' => 'new'],
                ['controller' => 'Wiki', 'action' => 'edit'],
                ['controller' => 'Wiki', 'action' => 'update'],
                ['controller' => 'Wiki', 'action' => 'preview'],
                ['controller' => 'Wiki', 'action' => 'add_attachment'],
                ['controller' => 'Attachments', 'action' => 'update'],
            ],
            'project_module' => 'wiki',
        ],
        'rename_wiki_pages' => [
            'actions' => [
                ['controller' => 'Wiki', 'action' => 'rename'],
            ],
            'require' => 'member',
            'project_module' => 'wiki',
        ],
        'delete_wiki_pages' => [
            'actions' => [
                ['controller' => 'Wiki', 'action' => 'destroy'],
                ['controller' => 'Wiki', 'action' => 'destroy_version'],
            ],
            'require' => 'member',
            'project_module' => 'wiki',
        ],
        'delete_wiki_pages_attachments' => [
            'actions' => [
            ],
            'project_module' => 'wiki',
        ],
        'view_wiki_page_watchers' => [
            'actions' => [
            ],
            'read' => true,
            'project_module' => 'wiki',
        ],
        'add_wiki_page_watchers' => [
            'actions' => [
                ['controller' => 'Watchers', 'action' => 'new'],
                ['controller' => 'Watchers', 'action' => 'create'],
                ['controller' => 'Watchers', 'action' => 'autocomplete_for_user'],
                ['controller' => 'Watchers', 'action' => 'autocomplete_for_mention'],
            ],
            'project_module' => 'wiki',
        ],
        'delete_wiki_page_watchers' => [
            'actions' => [
                ['controller' => 'Watchers', 'action' => 'destroy'],
            ],
            'project_module' => 'wiki',
        ],
        'protect_wiki_pages' => [
            'actions' => [
                ['controller' => 'Wiki', 'action' => 'protect'],
            ],
            'require' => 'member',
            'project_module' => 'wiki',
        ],
        'manage_wiki' => [
            'actions' => [
                ['controller' => 'Wiki', 'action' => 'destroy'],
            ],
            'require' => 'member',
            'project_module' => 'wiki',
        ],
        //# repository
        'view_changesets' => [
            'actions' => [
                ['controller' => 'Repositories', 'action' => 'show'],
                ['controller' => 'Repositories', 'action' => 'revisions'],
                ['controller' => 'Repositories', 'action' => 'revision'],
            ],
            'read' => true,
            'project_module' => 'repository',
        ],
        'browse_repository' => [
            'actions' => [
                ['controller' => 'Repositories', 'action' => 'show'],
                ['controller' => 'Repositories', 'action' => 'browse'],
                ['controller' => 'Repositories', 'action' => 'entry'],
                ['controller' => 'Repositories', 'action' => 'raw'],
                ['controller' => 'Repositories', 'action' => 'annotate'],
                ['controller' => 'Repositories', 'action' => 'changes'],
                ['controller' => 'Repositories', 'action' => 'diff'],
                ['controller' => 'Repositories', 'action' => 'stats'],
                ['controller' => 'Repositories', 'action' => 'graph'],
            ],
            'read' => true,
            'project_module' => 'repository',
        ],
        'commit_access' => [
            'actions' => [
            ],
            'project_module' => 'repository',
        ],
        'manage_related_issues' => [
            'actions' => [
                ['controller' => 'Repositories', 'action' => 'add_related_issue'],
                ['controller' => 'Repositories', 'action' => 'remove_related_issue'],
            ],
            'project_module' => 'repository',
        ],
        'manage_repository' => [
            'actions' => [
                ['controller' => 'Projects', 'action' => 'settings'],
                ['controller' => 'Repositories', 'action' => 'new'],
                ['controller' => 'Repositories', 'action' => 'create'],
                ['controller' => 'Repositories', 'action' => 'edit'],
                ['controller' => 'Repositories', 'action' => 'update'],
                ['controller' => 'Repositories', 'action' => 'committers'],
                ['controller' => 'Repositories', 'action' => 'destroy'],
                ['controller' => 'Repositories', 'action' => 'fetch_changesets'],
            ],
            'require' => 'member',
            'project_module' => 'repository',
        ],
        //# boards
        'view_messages' => [
            'actions' => [
                ['controller' => 'Boards', 'action' => 'index'],
                ['controller' => 'Boards', 'action' => 'show'],
                ['controller' => 'Messages', 'action' => 'show'],
            ],
            'read' => true,
            'project_module' => 'boards',
        ],
        'add_messages' => [
            'actions' => [
                ['controller' => 'Messages', 'action' => 'new'],
                ['controller' => 'Messages', 'action' => 'reply'],
                ['controller' => 'Messages', 'action' => 'quote'],
                ['controller' => 'Attachments', 'action' => 'update'],
            ],
            'project_module' => 'boards',
        ],
        'edit_messages' => [
            'actions' => [
                ['controller' => 'Messages', 'action' => 'edit'],
                ['controller' => 'Attachments', 'action' => 'update'],
            ],
            'require' => 'member',
            'project_module' => 'boards',
        ],
        'edit_own_messages' => [
            'actions' => [
                ['controller' => 'Messages', 'action' => 'edit'],
                ['controller' => 'Attachments', 'action' => 'update'],
            ],
            'require' => 'loggedin',
            'project_module' => 'boards',
        ],
        'delete_messages' => [
            'actions' => [
                ['controller' => 'Messages', 'action' => 'destroy'],
            ],
            'require' => 'member',
            'project_module' => 'boards',
        ],
        'delete_own_messages' => [
            'actions' => [
                ['controller' => 'Messages', 'action' => 'destroy'],
            ],
            'require' => 'loggedin',
            'project_module' => 'boards',
        ],
        'view_message_watchers' => [
            'actions' => [
            ],
            'read' => true,
            'project_module' => 'boards',
        ],
        'add_message_watchers' => [
            'actions' => [
                ['controller' => 'Watchers', 'action' => 'new'],
                ['controller' => 'Watchers', 'action' => 'create'],
                ['controller' => 'Watchers', 'action' => 'autocomplete_for_user'],
                ['controller' => 'Watchers', 'action' => 'autocomplete_for_mention'],
            ],
            'project_module' => 'boards',
        ],
        'delete_message_watchers' => [
            'actions' => [
                ['controller' => 'Watchers', 'action' => 'destroy'],
            ],
            'project_module' => 'boards',
        ],
        'manage_boards' => [
            'actions' => [
                ['controller' => 'Projects', 'action' => 'settings'],
                ['controller' => 'Boards', 'action' => 'new'],
                ['controller' => 'Boards', 'action' => 'create'],
                ['controller' => 'Boards', 'action' => 'edit'],
                ['controller' => 'Boards', 'action' => 'update'],
                ['controller' => 'Boards', 'action' => 'destroy'],
            ],
            'require' => 'member',
            'project_module' => 'boards',
        ],
        //# calendar
        'view_calendar' => [
            'actions' => [
                ['controller' => 'Calendars', 'action' => 'show'],
                ['controller' => 'Calendars', 'action' => 'update'],
            ],
            'read' => true,
            'project_module' => 'calendar',
        ],
        //# gantt
        'view_gantt' => [
            'actions' => [
                ['controller' => 'Gantts', 'action' => 'show'],
                ['controller' => 'Gantts', 'action' => 'update'],
            ],
            'read' => true,
            'project_module' => 'gantt',
        ],

    ],
];
