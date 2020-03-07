//import axios from 'axios'
//import Swal from 'sweatalert2';

document.addEventListener("DOMContentLoaded", function(event) {
    /* alumnos : para el manejo de materiales */
    materiales('tree2');
    /* instructor : form courses */ 
    editor('editor-course','Ingresa descripcion del curso');
    nestable('nestable');
    flatpickr('flatpickr');
    truncateText('.text-description-course',107)
});
const materiales = (elemt) => {
    var openedClass = 'fa-folder-open';
    var closedClass = 'fa-folder';
    var tree = $('#'+elemt);
    $('#'+elemt).css('display','block');
    tree.addClass("tree");
    tree.find('li').has("ul").each(function () {
        var branch = $(this); //li with children ul
        branch.prepend("<i class='indicator fas " + closedClass + "'></i>");
        branch.addClass('branch');
        branch.on('click', function (e) {
            if (this == e.target) {
                var icon = $(this).children('i:first');
                icon.toggleClass(openedClass + " " + closedClass);
                $(this).children().children().toggle();
            }
        })
        branch.children().children().toggle();
    });
    tree.find('.branch .indicator').each(function(){
        $(this).on('click', function () {
            $(this).closest('li').click();
        });
    });
    tree.find('.branch>a').each(function () {
        $(this).on('click', function (e) {
            $(this).closest('li').click();
            e.preventDefault();
        });
    });
}
const editor = (elemt,placeholder) => {
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],
      
        [{ 'header': 1 }, { 'header': 2 }],               // custom button values
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
        [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
        [{ 'direction': 'rtl' }],                         // text direction
      
        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
      
        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
        [{ 'font': [] }],
        [{ 'align': [] }],
      
        ['clean']                                         // remove formatting button
      ];
      
    var quill = new Quill('.'+elemt, {
    modules: {
        toolbar: toolbarOptions
    },
    placeholder: placeholder,
    theme: 'snow'
    });
}
const nestable = (elemt) => {
    $('.'+elemt).nestable({ 
        rootClass: "nestable",
        listNodeName: "ul",
        listClass: "nestable-list",
        itemClass: "nestable-item",
        dragClass: "nestable-drag",
        handleClass: "nestable-handle",
        collapsedClass: "nestable-collapsed",
        placeClass: "nestable-placeholder",
        emptyClass: "nestable-empty"
    });
}
const flatpickr = (elemt) => {
    $('[data-toggle="'+elemt+'"]').each(function() {
        var t = $(this),
            n = {
                mode: void 0 !== t.data("flatpickr-mode") ? t.data("flatpickr-mode") : "single",
                altInput: void 0 === t.data("flatpickr-alt-input") || t.data("flatpickr-alt-input"),
                altFormat: void 0 !== t.data("flatpickr-alt-format") ? t.data("flatpickr-alt-format") : "F j, Y",
                dateFormat: void 0 !== t.data("flatpickr-date-format") ? t.data("flatpickr-date-format") : "Y-m-d",
                wrap: void 0 !== t.data("flatpickr-wrap") && t.data("flatpickr-wrap"),
                inline: void 0 !== t.data("flatpickr-inline") && t.data("flatpickr-inline"),
                static: void 0 !== t.data("flatpickr-static") && t.data("flatpickr-static"),
                enableTime: void 0 !== t.data("flatpickr-enable-time") && t.data("flatpickr-enable-time"),
                noCalendar: void 0 !== t.data("flatpickr-no-calendar") && t.data("flatpickr-no-calendar"),
                appendTo: void 0 !== t.data("flatpickr-append-to") ? document.querySelector(t.data("flatpickr-append-to")) : void 0,
                onChange: function(r, e) {
                    n.wrap && t.find("[data-toggle]").text(e)
                }
            };
        t.flatpickr(n)
    });
}
const previewfile = (input, image) => {
    var preview = document.querySelector('img.'+image);
    var file    = document.querySelector('input[name='+input+']').files[0];
    var label   = document.querySelector('.label-curso');
    var reader  = new FileReader();
  
    reader.onloadend = function () {
      preview.src = reader.result;
    }
  
    if (file) {
      reader.readAsDataURL(file);
      label.innerText = file.name;
    } else {
      preview.src = "/images/default-image.jpg";
      label.innerText = 'Logo del curso es obligatorio';
    }
}
const YouTubeGetID = (e) => {
    let url = e.target.value;
    let ID = '';
    url = url.replace(/(>|<)/gi,'').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
    if(url[2] !== undefined) {
      ID = url[2].split(/[^0-9a-z_\-]/i);
      ID = ID[0];
    }else {
      ID = url;
    }
    //return ID;
    var iframe = document.querySelector('.embed-responsive-item')
    iframe.src = `https://www.youtube.com/embed/${ID}`
    e.target.value = `https://www.youtube.com/watch?v=${ID}`
    event.target.dataset.id = ID
}
const formCourse = async (event) => {
    event.preventDefault()
    var estado_form_basic = false;
    var estado_form_video = false;
    const formData = new FormData()
    /* forms */
    var form_basic = document.getElementsByClassName('form-course-basic')
    var form_video = document.getElementsByClassName('form-course-video')
    var form_detalle = document.getElementsByClassName('form-course-detalle')
    /* basic form*/
    let name = document.querySelector('input[name="name"]').value
    let instructor_id = document.querySelector('input[name="instructor_id"]').value
    let editor_course = document.querySelector('.editor-course')
    let description = editor_course.children[0].innerHTML
    let url_image = document.querySelector('input[name="url_image"]')
    /* video form*/
    let url_video = document.querySelector('input[name="url_video"]').value
    /* detalle form*/
    let category = document.getElementById("category").value
    let duration = document.querySelector('input[name="duration"]').value 
    let start_date = document.querySelector('input[name="start_date"]').value
    let end_date = document.querySelector('input[name="end_date"]').value
    /* validacion */
    var validation = Array.prototype.filter.call(form_basic, function(form) {
        estado_form_basic = form.checkValidity()
        if( estado_form_basic === true){
            formData.set("name", name)
            formData.set("description", description)
            formData.set("instructor_id", instructor_id)
            formData.append("url_image", url_image.files[0])
        }
        form.classList.add('was-validated');
    });
    if(estado_form_basic){
        var validation = Array.prototype.filter.call(form_video, function(form) {
            estado_form_video = form.checkValidity()
            if( estado_form_video === true){
                formData.set("url_video", url_video)
            }
            form.classList.add('was-validated');
        });
    }else{
        var validation = Array.prototype.filter.call(form_video, function(form) {
            form.classList.remove('was-validated');
            estado_form_video = false
        });
    }
    if(estado_form_video){
        var validation = Array.prototype.filter.call(form_detalle, function(form) {
            console.log(form.checkValidity())
            if(form.checkValidity() === true){
                formData.set("category", category)
                formData.set("duration", duration)
                formData.set("start_date", start_date)
                formData.set("end_date", end_date)
            }
            form.classList.add('was-validated');
        });
    }else{
        var validation = Array.prototype.filter.call(form_detalle, function(form) {
            form.classList.remove('was-validated');
        });
    }

    axios({
        method: 'post',
        url: '/cursos/store',
        data: formData,
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').attributes.content.textContent,
            'Content-Type': 'multipart/form-data'}
        })
        .then(function (response) {
            console.log(response.status)
            if(response.status === 200){ 
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    showCloseButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    text: 'Se registro su curso correctamente',
                })
                .then(function (result) {
                    if (result.value) {
                        window.location = "/cursos";
                    }
                })
            }else{

            }
            //reset form
            console.log(response);
        })
        .catch(function (response) {
            //handle error
            console.log(response);
        });
    
}
const truncateText = (elemt, maxLength) => {
    var elements = document.querySelectorAll(elemt);
    for (var i = 0; i < elements.length; i++) { 
        var element = elements[i],
        truncated = element.innerText;

        if (truncated.length > maxLength) {
            truncated = truncated.substr(0,maxLength) + '...';
        }
        element.innerText = truncated;
    }
}

/*document.getElementById('question').addEventListener('click', ()=>{
    editor('editor')
});*/
 