<?php
    /*
     * Настройка routs
     *      method - метод передачи данных
     *      controller - наименование контроллера @ метода
     *      path - URL
     * 'роут'=>'Контроллер@Функция'
     * : - обозначает динамическое значение с именем переменной, которой присваивается это значение
     */
    return [
        '' => 'Main@index',
        'about' => 'Main@sub',
        'about/history'=>'About@history',
        'about/employee' => 'Employee@index',
        'about/employee/:id' => 'Employee@view',
        //'about/best' => 'Employee@best',
        'about/best' => 'Message@nocontent',
        //'3d' => 'Threed@index',
        '3d' => 'Panarama@index',
        
        'candidate' => 'Main@sub',
        'appeals' => 'Main@sub',
        'appeals/:uri' => 'Appeals@view',
        'for_cadet' => 'Main@sub',
        'documents_organization' => 'Main@sub',
        //'documents_organization/ga' => 'Documents@ga',
        'documents_organization/ga' => 'Message@nocontent',
        //'documents_organization/charter' => 'Documents@charter',
        'documents_organization/charter' => 'Message@nocontent',
        //'documents_organization/statement' => 'Documents@statement',
        'documents_organization/statement' => 'Message@nocontent',
	'documents_organization/license' => 'Message@nocontent',
        //'candidate/general_information' => 'Candidate@generalInformation',
        
        'candidate/result' => 'Message@nocontent',
        
        'candidate/admission_rules' => 'Main@sub',
        'candidate/admission_rules/:uri' => 'Document@viewByUri',
        
        'candidate/general_information' => 'Main@sub',
        'candidate/general_information/:uri' => 'Arts@view',
        'candidate/:uri' => 'Arts@view',
        
        'for_cadet/full-time_study_schedule' => 'Document@viewByLastExplodeUri',
        //'for_cadet/electronic_journal' => 'Cadet@electronicJournal',
        'for_cadet/electronic_journal' => 'Message@nocontent',
        //'for_cadet/list_of_written_works_on_platoons' => 'Cadet@listOfWrittenWorksOnPlatoons',
        'for_cadet/list_of_written_works_on_platoons' => 'Message@nocontent',
        'for_cadet/correspondence_schedule' => 'Main@sub',
        'for_cadet/correspondence_schedule/:uri' => 'Document@viewByUri',
        'for_cadet/:uri' => 'Arts@view',
    ];
