
import Dropzone from "dropzone";

Dropzone.autoDiscover=false;

const dropzone = new Dropzone("#dropzone",{
    dictDefaultMessage: "Sube tu imagen aqui",
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,


    init: function(){

   if (document.querySelector ('[name="imagen"]').value.trim()) {
    
    const imagen_publicada={}
    imagen_publicada.size=1234;
    imagen_publicada.name=document.querySelector ('[name="imagen"]').value;

    this.options.addedfile.call(this, imagen_publicada);
    this.options.thumbnail.call(this, imagen_publicada, `/uploads/${imagen_publicada.name}`);
    
    imagen_publicada.previewElement.classList.add('dz-success', 'dz-complete');

   }


    },

} );


    

dropzone.on("success", function (file, response ) {
    
    document.querySelector('[name="imagen"]').value=response.imagen;
});



dropzone.on("removefile", function () {
    document.querySelector('[name="imagen"]').value='';
});



