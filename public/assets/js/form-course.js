//import axios from 'axios'
//import Swal from 'sweatalert2';
let currentLocation = window.location.pathname
currentLocation = currentLocation.replace('/','')

document.addEventListener("DOMContentLoaded", function(event) {
     /* alumnos : para el manejo de materiales */
     materiales('tree2');
     /* instructor : form courses */ 
     editor('editor-course','Ingresa descripcion del curso');
     nestable('nestable');
     flatpickr('flatpickr');
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
        ['bold', 'italic', 'underline'],        // toggled buttons
        //['blockquote', 'code-block'],
      
        //[{ 'header': 1 }, { 'header': 2 }],               // custom button values
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        //[{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
        //[{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
        //[{ 'direction': 'rtl' }],                         // text direction
      
        //[{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
      
        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
        [{ 'font': [] }],
        [{ 'align': [] }],
      
        //['clean']                                         // remove formatting button
      ];
      
    var quill = new Quill('.'+elemt, {
    modules: {
        toolbar: toolbarOptions
    },
    placeholder: placeholder,
    theme: 'snow' 
    });
    let content = quill.getContents().ops[0].insert 
    console.log(quill.getContents())
    quill.clipboard.dangerouslyPasteHTML(content)
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
const YouTubeGetID = (e,iframe) => {
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
    var iframe = document.querySelector('.'+iframe)
    iframe.src = `https://www.youtube.com/embed/${ID}`
    e.target.value = `https://www.youtube.com/watch?v=${ID}`
    event.target.dataset.id = ID
}
const formCourse = async (event) => {
    event.preventDefault()
    let operation = event.target.dataset.operation
    let url = operation == 'insert' ? '/cursos/store' : '/cursos/update'
    let estado_form_basic = false;
    let estado_form_video = false;
    const formData = new FormData()
    /* forms */
    let form_basic = document.getElementsByClassName('form-course-basic')
    let form_video = document.getElementsByClassName('form-course-video')
    let form_detalle = document.getElementsByClassName('form-course-detalle')
    /* basic form*/
    let id = document.querySelector('input[name="course_id"]').value
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
    if(operation == 'insert'){
        /* validacion operation is insert */
        let validation = Array.prototype.filter.call(form_basic, function(form) {
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
            let validation = Array.prototype.filter.call(form_video, function(form) {
                estado_form_video = form.checkValidity()
                if( estado_form_video === true){
                    formData.set("url_video", url_video)
                }
                form.classList.add('was-validated');
            });
        }else{
            let validation = Array.prototype.filter.call(form_video, function(form) {
                form.classList.remove('was-validated');
                estado_form_video = false
            });
        }
        if(estado_form_video){
            let validation = Array.prototype.filter.call(form_detalle, function(form) {
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
            let validation = Array.prototype.filter.call(form_detalle, function(form) {
                form.classList.remove('was-validated');
            });
        }
    }else{
        /* validacion operaton is update */
        formData.set("id", id)
        formData.set("name", name !== '' ? name : null)
        formData.set("description", description !== '' ? description : null)
        formData.set("instructor_id", instructor_id !== '' ? instructor_id : null)
        formData.append("url_image", url_image.value !== '' ? url_image.files[0] : url_image.dataset.content)
        formData.set("url_video", url_video !== '' ? url_video : null)
        formData.set("category", category !== '' ? category : null)
        formData.set("duration", duration !== '' ? duration : null)
        formData.set("start_date", start_date !== '' ? start_date : null)
        formData.set("end_date", end_date !== '' ? end_date : null)
    }

    axios({
        method: 'post',
        url: url,
        data: formData,
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').attributes.content.textContent,
            'Content-Type': 'multipart/form-data'}
        })
        .then(function (response) {
            if(response.status === 200){ 
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    showCloseButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Volver',
                    text: response.data.msj,
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
const formModalLesson = async (event) => {
    event.preventDefault()
    let url = '/lesson/store' 
    let instructor_id = document.querySelector('input[name="instructor_id"]').value
    let id = document.querySelector('input[name="course_id"]').value
    let name = document.querySelector('input[name="name-session"]').value
    /*validate*/
    let form_modal_class = document.getElementsByClassName('form-course-modal')
    const formModalData = new FormData()
    Array.prototype.filter.call(form_modal_class, function(form) {
        estado_form_modal = form.checkValidity()
        if( estado_form_modal === true){
            formModalData.set("course_id", id)
            formModalData.set("instructor_id", instructor_id)
            formModalData.set("name", name)
        }
        form.classList.add('was-validated');
    });
    /*insert*/
    axios({
        method: 'post',
        url: url,
        data: formModalData,
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').attributes.content.textContent,
            'Content-Type': 'multipart/form-data'}
        })
        .then(function (response) {
            //handle success
                let logo = document.querySelector('.img-logo-curso').src
                let template_session = `<li class="nestable-item nestable-item-handle" data-id="3">
                <div class="nestable-handle"><i class="material-icons">swap_vert</i></div>
                <div class="nestable-content">
                    <div class="d-flex align-items-center card-header" style="padding: 0;">
                        <a href="fixed-student-take-course.html" class="mr-3">
                            <img src="${logo}" width="100" alt="" class="rounded">
                        </a>
                        <div class="flex">
                            <h4 class="card-title mb-0"><a href="fixed-student-take-course.html">${response.data.lesson.name}</a></h4>
                            <span class="badge badge-primary">Advanced</span>
                        </div>
                        <div class="media-right">
                            <a href="#" class="btn btn-white btn-sm" data-toggle="dropdown"><i class="material-icons">menu</i></a>
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#sessions"><i class="material-icons">add_circle</i>Agregar sesion</a>
                                <a class="dropdown-item" href="#"><i class="material-icons">edit</i>Editar clase</a>
                                <a class="dropdown-item" href="#"><i class="material-icons">remove_circle</i>Eliminar clase</a>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-fit">
                    ${Object.keys(lesson).map(function (key) {
                        return "<option value='" + key + "'>xxxx</option>"           
                    }).join("")}
                        <li class="list-group-item" style="display: flex;justify-content: space-between;padding: 0.75rem 0rem;">
                            <a href="fixed-student-view-course.html" class="text-body text-decoration-0 d-flex align-items-center">
                                <strong>Basics of Vue.js</strong>
                                <div class="media-right">
                                    <a href="fixed-instructor-lesson-add.html" class="btn btn-white btn-sm" data-toggle="modal" data-target="#sessions"><i class="material-icons">edit</i></a>
                                    <a href="fixed-instructor-lesson-add.html" class="btn btn-white btn-sm"><i class="material-icons">delete</i></a>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>`;
            document.querySelector('.nestable-list').insertAdjacentHTML('beforeend',template_session)
            //console.log(response.data.session.name);
        })
        .catch(function (response) {
            //handle error
            console.log(response);
        });
    /*update*/
}
const formModalSession = async (event) => {
    event.preventDefault()
    let url = '/session/store'
    let instructor_id = document.querySelector('input[name="instructor_id"]').value
    let id = document.querySelector('input[name="course_id"]').value
    let name = document.querySelector('input[name="name-session"]').value
    let editor_modal_course = document.querySelector('.editor-course-modal')
    let description = editor_modal_course.children[0].innerHTML
    let url_video = document.querySelector('input[name="url_video_session"]').value
    /*validate*/
    let form_modal = document.getElementsByClassName('form-course-modal')
    const formModalData = new FormData()
    Array.prototype.filter.call(form_modal, function(form) {
        estado_form_modal = form.checkValidity()
        if( estado_form_modal === true){
            formModalData.set("name", name)
            formModalData.set("description", description)
            formModalData.append("url_video", url_video)
        }
        form.classList.add('was-validated');
    });
    /*insert*/
    axios({
        method: 'post',
        url: url,
        data: formModalData,
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').attributes.content.textContent,
            'Content-Type': 'multipart/form-data'}
        })
        .then(function (response) {
            //handle success
            console.log(response);
        })
        .catch(function (response) {
            //handle error
            console.log(response);
        });
    /*update*/
}

/*document.getElementById('question').addEventListener('click', ()=>{
    editor('editor')
});*/
/* bootstrap modal juqery */
$('#sessions').on('show.bs.modal', function (e) {
    $('.modal-description').html('<div class="editor-course-modal"></div>')
    editor('editor-course-modal','Ingresa descripcion para la clase');
}); 
$('#sessions').on('hide.bs.modal', function (e) {
    $( ".editor-course-modal" ).remove();
});
