/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function(config) {
    config.toolbarGroups = [
        { name: 'clipboard', groups: ['clipboard', 'undo'] },
        { name: 'document', groups: ['document', 'mode', 'doctools'] },
        { name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing'] },
        { name: 'forms', groups: ['forms'] },
        '/',
        { name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
        { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph'] },
        { name: 'links', groups: ['links'] },
        { name: 'insert', groups: ['insert'] },
        '/',
        { name: 'styles', groups: ['styles'] },
        { name: 'colors', groups: ['colors'] },
        { name: 'tools', groups: ['tools'] },
        { name: 'others', groups: ['others'] },
        { name: 'about', groups: ['about'] }
    ];

    config.entities = false;
    config.htmlEncodeOutput = false;
    config.entities_latin = false;
    config.ForceSimpleAmpersand = true;
    config.filebrowserBrowseUrl = '/ckfinder/ckfinder.html';
    config.filebrowserUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.removeButtons = 'Cut,Undo,Save,Source,Templates,About,ShowBlocks,SelectAll,Scayt,Find,Form,Outdent,Indent,CreateDiv,BidiLtr,BidiRtl,Replace,Redo,Copy,Paste,PasteText,PasteFromWord,NewPage,Preview,Print,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Flash,HorizontalRule,Iframe,PageBreak,BGColor';
};