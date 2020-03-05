//import axios from 'axios'
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
}

const formCourse = async (event) => {
    event.preventDefault()

    let name = document.querySelector('input[name="name"]').value
    let editor_course = document.querySelector('.editor-course')
    let description = editor_course.children[0].innerHTML
    let url_image = document.querySelector('input[name="url_image"]')
 
    const formData = new FormData()
    formData.set("name", name)
    formData.set("description", description)
    formData.append("url_image", url_image.files[0])

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
            //handle success
            console.log(response);
        })
        .catch(function (response) {
            //handle error
            console.log(response);
        });
    
}
/*document.getElementById('question').addEventListener('click', ()=>{
    editor('editor')
});*/
 