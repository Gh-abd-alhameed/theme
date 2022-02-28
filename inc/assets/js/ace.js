// ace editor 
let textarea = document.getElementById("maxart_register_custom_css");
var editor = ace.edit("editor");
editor.setTheme("ace/theme/monokai");
editor.session.setMode("ace/mode/css");
let form = document.getElementById('form-css');


editor.addEventListener ('change' , ()=>{
   console.log(editor.getValue())
   textarea.innerHTML = editor.getValue();

})




