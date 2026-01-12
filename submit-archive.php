<?php 
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * FROM `archive_list` where id = '{$_GET['id']}'");
    if($qry->num_rows){
        foreach($qry->fetch_array() as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
    if(isset($student_id)){
        if($student_id != $_settings->userdata('id')){
            echo "<script> alert('You don\'t have an access to this page'); location.replace('./'); </script>";
        }
    }
}
?>
<style>
    .banner-img{
        object-fit:cover;
        object-position:center center;
        height:30vh;
        width:calc(100%);
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.15);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .banner-img:hover {
        transform: scale(1.02);
        box-shadow: 0 12px 35px rgba(99, 102, 241, 0.25);
    }

 
    .archive-container {
        background: rgba(255,255,255,0.95);
        border-radius: 25px;
        padding: 2rem;
        box-shadow: 0 8px 32px rgba(63, 81, 181, 0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(63, 81, 181, 0.1);
    }

    .archive-card {
        background: rgba(248, 250, 255, 0.8);
        border: 1px solid rgba(99, 102, 241, 0.1) !important;
        border-radius: 20px !important;
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.1);
        overflow: hidden;
    }

    .archive-title {
        color: #2e2e93ff !important;
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 0;
        text-align: center;
    }

    .form-section {
        padding: 2rem;
    }

    .form-control {
        border-radius: 10px !important;
        border: 2px solid rgba(99, 102, 241, 0.2);
        padding: 12px 16px;
        transition: all 0.3s ease;
        background: rgba(255,255,255,0.9);
        width: 100%;
        display: block;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
    }

    .form-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
        background: white;
        outline: 0;
    }

    select.form-control {
        cursor: pointer;
        height: auto;
        padding: 12px 16px;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236366f1' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 12px center;
        background-repeat: no-repeat;
        background-size: 16px 12px;
        padding-right: 40px;
    }

    input[type="file"].form-control {
        padding: 8px 12px;
        height: auto;
        line-height: 1.5;
    }

    input[type="file"].form-control::file-selector-button {
        background: linear-gradient(135deg, #6366f1, #5856eb);
        color: white;
        border: none;
        border-radius: 6px;
        padding: 6px 12px;
        margin-right: 12px;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    input[type="file"].form-control::file-selector-button:hover {
        background: linear-gradient(135deg, #5856eb, #4f46e5);
    }

    .control-label {
        color: #2e2e93ff !important;
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 0.75rem;
        display: block;
    }

    .btn-primary-custom {
        background: linear-gradient(135deg, #6366f1, #5856eb) !important;
        border: none !important;
        border-radius: 15px !important;
        padding: 12px 30px !important;
        font-weight: 600;
        color: white;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
        transition: all 0.4s ease;
        text-decoration: none;
    }

    .btn-primary-custom:hover {
        background: linear-gradient(135deg, #5856eb, #4f46e5) !important;
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
        transform: translateY(-2px);
        color: white;
    }

    .btn-secondary-custom {
        background: linear-gradient(135deg, #6b7280, #4b5563) !important;
        border: none !important;
        border-radius: 15px !important;
        padding: 12px 30px !important;
        font-weight: 600;
        color: white;
        transition: all 0.4s ease;
        text-decoration: none;
    }

    .btn-secondary-custom:hover {
        background: linear-gradient(135deg, #4b5563, #374151) !important;
        transform: translateY(-2px);
        color: white;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .image-preview-container {
        background: rgba(248, 250, 255, 0.8);
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        margin-top: 1rem;
        border: 1px solid rgba(99, 102, 241, 0.1);
    }

    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        width: 100%;
    }

    .file-input-custom {
        background: linear-gradient(135deg, #6366f1, #5856eb);
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        color: white;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
    }

    .file-input-custom:hover {
        background: linear-gradient(135deg, #5856eb, #4f46e5);
        transform: translateY(-1px);
    }

    select.form-control {
        cursor: pointer;
    }

    .row {
        margin-bottom: 1rem;
    }

    .pdf-preview-wrapper {
        background: rgba(248, 250, 255, 0.8);
        border-radius: 15px;
        padding: 1rem;
        border: 1px solid rgba(99, 102, 241, 0.1);
    }

    .pdf-placeholder {
        background: rgba(248, 250, 255, 0.8) !important;
        border: 2px dashed #6366f1 !important;
        border-radius: 10px;
        padding: 2rem;
        color: #6b7280 !important;
    }

    @media (max-width: 768px) {
        .archive-container {
            margin: 1rem;
            padding: 1.5rem;
        }
        
        .archive-title {
            font-size: 1.5rem;
        }
        
        .form-section {
            padding: 1rem;
        }
    }
</style>
<div class="content py-4">
    <div class="container-fluid">
        <div class="archive-container">
            <div class="text-center mb-4">
                <h1 class="archive-title"><?= isset($id) ? "Update Archive-{$archive_code} Details" : "Submit Project" ?></h1>
            </div>
            <div class="archive-card">
                <div class="form-section">
                    <form action="" id="archive-form">
                        <input type="hidden" name="id" value="<?= isset($id) ? $id : "" ?>">
                        <div class="row">
                            <div class="col-lg-8 col-md-10">
                                <div class="form-group">
                                    <label for="title" class="control-label">Project Title</label>
                                    <input type="text" name="title" id="title" autofocus placeholder="Project Title" class="form-control" value="<?= isset($title) ?$title : "" ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <div class="form-group">
                                    <label for="year" class="control-label">Year</label>
                                    <select name="year" id="year" class="form-control" required>
                                        <?php 
                                            for($i= 0;$i < 51; $i++):
                                        ?>
                                        <option <?= isset($year) && $year == date("Y",strtotime(date("Y")." -{$i} years")) ? "selected" : "" ?>><?= date("Y",strtotime(date("Y")." -{$i} years")) ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="abstract" class="control-label">Abstract</label>
                                    <textarea rows="3" name="abstract" id="abstract" placeholder="Abstract" class="form-control summernote" required><?= isset($abstract) ? html_entity_decode($abstract) : "" ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="members" class="control-label">Project Members</label>
                                    <textarea rows="3" name="members" id="members" placeholder="Project Members" class="form-control summernote-list-only" required><?= isset($members) ? html_entity_decode($members) : "" ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="img" class="control-label">Project Image/Banner Image</label>
                                    <input type="file" id="img" name="img" class="form-control" accept="image/png,image/jpeg" onchange="displayImg(this,$(this))" <?= !isset($id) ? "required" : "" ?>>
                                </div>

                                <div class="form-group text-center">
                                    <img src="<?= validate_image(isset($banner_path) ? $banner_path : "") ?>" alt="Project Banner" id="cimg" class="banner-img">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="pdf" class="control-label">Project Document (PDF File Only)</label>
                                    <input type="file" id="pdf" name="pdf" class="form-control" accept="application/pdf" onchange="displayPdf(this)" <?= !isset($id) ? "required" : "" ?>>
                                </div>
                                <div class="form-group text-center" id="pdf-preview-container" style="<?= !isset($document_path) ? 'display:none;' : '' ?>">
                                    <div class="pdf-preview-wrapper">
                                        <h6 class="control-label">Document Preview:</h6>
                                        <?php if(isset($document_path) && !empty($document_path)): ?>
                                        <embed src="<?= validate_image($document_path) ?>" type="application/pdf" width="100%" height="500px" style="border-radius: 10px; border: 2px solid #6366f1;">
                                        <div class="mt-2">
                                            <a href="<?= validate_image($document_path) ?>" target="_blank" class="btn btn-sm btn-primary-custom">
                                                <i class="fa fa-external-link-alt"></i> Open in New Tab
                                            </a>
                                        </div>
                                        <?php else: ?>
                                        <div class="pdf-placeholder" style="background: rgba(248, 250, 255, 0.8); border: 2px dashed #6366f1; border-radius: 10px; padding: 2rem; color: #6b7280;">
                                            <i class="fa fa-file-pdf fa-3x mb-3"></i>
                                            <p>PDF preview will appear here after selecting a file</p>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group text-center">
                                    <button class="btn btn-primary-custom">Update</button>
                                    <a href="./?page=profile" class="btn btn-secondary-custom">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }else{
            $('#cimg').attr('src', "<?= validate_image(isset($avatar) ? $avatar : "") ?>");
        }
	}

    function displayPdf(input) {
        if (input.files && input.files[0]) {
            var file = input.files[0];
            var fileURL = URL.createObjectURL(file);
            
            // Show the preview container
            $('#pdf-preview-container').show();
            
            // Create the PDF preview
            var pdfPreview = `
                <div class="pdf-preview-wrapper">
                    <h6 class="control-label">Document Preview:</h6>
                    <embed src="${fileURL}" type="application/pdf" width="100%" height="500px" style="border-radius: 10px; border: 2px solid #6366f1;">
                    <div class="mt-2">
                        <a href="${fileURL}" target="_blank" class="btn btn-sm btn-primary-custom">
                            <i class="fa fa-external-link-alt"></i> Open in New Tab
                        </a>
                    </div>
                </div>
            `;
            
            $('#pdf-preview-container').html(pdfPreview);
        } else {
            $('#pdf-preview-container').hide();
        }
    }

    $(function(){
        $('.summernote').summernote({
            height: 200,
            toolbar: [
                [ 'style', [ 'style' ] ],
                [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
                [ 'fontname', [ 'fontname' ] ],
                [ 'fontsize', [ 'fontsize' ] ],
                [ 'color', [ 'color' ] ],
                [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
                [ 'table', [ 'table' ] ],
                ['insert', ['link', 'picture']],
                [ 'view', [ 'undo', 'redo', 'help' ] ]
            ]
        })
        $('.summernote-list-only').summernote({
            height: 200,
            toolbar: [
                [ 'font', [ 'bold', 'italic', 'clear'] ],
                [ 'fontname', [ 'fontname' ] ]
                [ 'color', [ 'color' ] ],
                [ 'para', [ 'ol', 'ul' ] ],
                [ 'view', [ 'undo', 'redo', 'help' ] ]
            ]
        })
        // Archive Form Submit
        $('#archive-form').submit(function(e){
            e.preventDefault()
            var _this = $(this)
                $(".pop-msg").remove()
            var el = $("<div>")
                el.addClass("alert pop-msg my-2")
                el.hide()
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=save_archive",
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType:'json',
                error:err=>{
                    console.log(err)
                    el.text("An error occured while saving the data")
                    el.addClass("alert-danger")
                    _this.prepend(el)
                    el.show('slow')
                    end_loader()
                },
                success:function(resp){
                    if(resp.status == 'success'){
                        location.href= "./?page=view_archive&id="+resp.id
                    }else if(!!resp.msg){
                        el.text(resp.msg)
                        el.addClass("alert-danger")
                        _this.prepend(el)
                        el.show('show')
                    }else{
                        el.text("An error occured while saving the data")
                        el.addClass("alert-danger")
                        _this.prepend(el)
                        el.show('show')
                    }
                    end_loader();
                    $('html, body').animate({scrollTop: 0},'fast')
                }
            })
        })
    })
</script>