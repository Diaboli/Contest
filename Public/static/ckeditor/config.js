CKEDITOR.editorConfig = function( config )
{

//工具栏
config.toolbar =
[
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Image','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
    '/',
    ['Styles','Format','Font','FontSize'],
    ['TextColor','BGColor'],
    ['Link','Unlink','Anchor'],
    ['Maximize', 'ShowBlocks','-','Source','-','Undo','Redo']


];
config.height = 500; //高度
config.font_names='宋体/宋体;黑体/黑体;仿宋/仿宋_GB2312;楷体/楷体_GB2312;隶书/隶书;幼圆/幼圆;微软雅黑/微软雅黑;'+ config.font_names;//字体
config.filebrowserUploadUrl = "./Home/Center/upload";//图片地址
};
