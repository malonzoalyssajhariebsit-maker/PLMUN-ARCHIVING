<?php 
$user = $conn->query("SELECT s.*,d.name as department, c.name as curriculum,CONCAT(lastname,', ',firstname,' ',middlename) as fullname FROM student_list s inner join department_list d on s.department_id = d.id inner join curriculum_list c on s.curriculum_id = c.id where s.id ='{$_settings->userdata('id')}'");
foreach($user->fetch_array() as $k =>$v){
    $$k = $v;
}
?>
<style>
    html, body {
        height: 100vh !important;
        width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
        background: #f8f9fa !important;
    }

    .profile-container {
        background: rgba(255, 255, 255, 0.95) !important;
        border-radius: 20px !important;
        padding: 2rem !important;
        box-shadow: 0 8px 32px rgba(63, 81, 181, 0.15) !important;
        backdrop-filter: blur(10px) !important;
        margin: 0 auto !important;
        max-width: 1200px !important;
        border: 1px solid rgba(63, 81, 181, 0.1) !important;
    }

    .profile-title {
        font-size: 2rem !important;
        font-weight: 600 !important;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
        color: #2e2e93ff !important;
        margin-bottom: 2rem !important;
        text-align: center !important;
        text-transform: uppercase !important;
        text-shadow: 1px 1px 2px rgba(99, 102, 241, 0.1) !important;
    }

    .info-card {
        background: rgba(248, 250, 255, 0.8) !important;
        border: 1px solid rgba(99, 102, 241, 0.1) !important;
        border-radius: 20px !important;
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.1) !important;
        overflow: hidden !important;
        backdrop-filter: blur(10px) !important;
    }

    .student-img {
        object-fit: cover !important;
        object-position: center center !important;
        height: 200px !important;
        width: 200px !important;
        border-radius: 50% !important;
        border: 4px solid #2e2e93ff !important;
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.2) !important;
        transition: transform 0.3s ease, box-shadow 0.3s ease !important;
    }
    
    .student-img:hover {
        transform: scale(1.05) !important;
        box-shadow: 0 12px 35px rgba(99, 102, 241, 0.3) !important;
    }

    .action-btn {
        border: none !important;
        border-radius: 12px !important;
        padding: 1rem 1.5rem !important;
        font-size: 0.875rem !important;
        font-weight: 600 !important;
        color: #ffffff !important;
        text-transform: none !important;
        letter-spacing: 0.5px !important;
        width: 100% !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
        text-decoration: none !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 0.5rem !important;
        margin-bottom: 1rem !important;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
    }

    .action-btn:hover {
        color: #ffffff !important;
        transform: translateY(-2px) !important;
        text-decoration: none !important;
    }

    .archives-btn {
        background: linear-gradient(135deg, #6366f1, #5856eb) !important;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3) !important;
    }

    .archives-btn:hover {
        background: linear-gradient(135deg, #5856eb, #4f46e5) !important;
        box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4) !important;
    }

    .update-btn {
        background: linear-gradient(135deg, #6b7280, #4b5563) !important;
        box-shadow: 0 4px 15px rgba(107, 114, 128, 0.3) !important;
    }

    .update-btn:hover {
        background: linear-gradient(135deg, #4b5563, #374151) !important;
        box-shadow: 0 6px 20px rgba(107, 114, 128, 0.4) !important;
    }

    .info-section {
        padding: 2rem !important;
    }

    .info-label {
        color: #2e2e93ff !important;
        font-weight: 600 !important;
        font-size: 0.875rem !important;
        margin-bottom: 0.5rem !important;
        text-transform: uppercase !important;
        letter-spacing: 0.5px !important;
    }

    .info-value {
        background: rgba(255, 255, 255, 0.9) !important;
        color: #374151 !important;
        font-size: 1rem !important;
        font-weight: 500 !important;
        padding: 0.75rem 1.5rem !important;
        border-radius: 12px !important;
        margin-bottom: 1rem !important;
        border: 1px solid rgba(99, 102, 241, 0.2) !important;
        line-height: 1.5 !important;
    }

    .button-container {
        display: flex !important;
        flex-direction: column !important;
        gap: 0rem !important;
        padding: 1rem !important;
        background: rgba(248, 250, 255, 0.8) !important;
        border-radius: 20px !important;
        border: 1px solid rgba(99, 102, 241, 0.1) !important;
    }

    .image-container {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        padding: 1rem !important;
    }

    .clickable-image {
        cursor: pointer !important;
        transition: all 0.3s ease !important;
        border-radius: 10px !important;
        border: 2px solid #6366f1 !important;
    }

    .clickable-image:hover {
        transform: scale(1.05) !important;
        box-shadow: 0 5px 15px rgba(99, 102, 241, 0.4) !important;
    }

    .separator-line {
        border-left: 2px solid rgba(99, 102, 241, 0.2) !important;
        padding-left: 2rem !important;
    }

    /* Modal Styles */
    .image-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(5px);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        position: relative;
        padding: 0;
        width: auto;
        max-width: 90vw;
        max-height: 90vh;
        text-align: center;
    }

    .modal-image {
        border-radius: 10px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        display: block;
        max-width: 100%;
        max-height: 90vh;
        width: auto;
        height: auto;
    }

    .close-btn {
        position: absolute;
        top: -15px;
        right: -15px;
        color: #ffffff;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        background: #ef4444;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        z-index: 10000;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    }

    .close-btn:hover {
        background: #dc2626;
        transform: scale(1.1);
    }

    @media (max-width: 768px) {
        .profile-container {
            margin: 1rem !important;
            padding: 1.5rem !important;
        }
        
        .action-btn {
            padding: 0.8rem 1.2rem !important;
            font-size: 0.8rem !important;
        }
        
        .student-img {
            height: 150px !important;
            width: 150px !important;
        }
        
        .separator-line {
            border-left: none !important;
            border-top: 2px solid rgba(99, 102, 241, 0.2) !important;
            padding-left: 0 !important;
            padding-top: 2rem !important;
            margin-top: 2rem !important;
        }
    }
</style>
<div class="content py-4">
    <div class="container-fluid">
        <div class="profile-container">
            <div class="text-center mb-4">
                <h1 class="profile-title">Personal Information</h1>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="info-card">
                        <div class="info-section">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="image-container">
                                        <img src="<?= validate_image($avatar) ?>" alt="Student Image" class="student-img">
                                    </div>
                                    <div class="mt-4 text-center">
                                        <div class="mb-2">
                                            <label class="info-label">ID Picture (Front)</label><br>
                                            <?php if(!empty($id_front)): ?>
                                                <img src="<?= validate_image($id_front) ?>" alt="ID Front" class="img-fluid clickable-image" style="max-width:120px;max-height:120px;" onclick="openModal('<?= validate_image($id_front) ?>', 'ID Picture (Front)')">
                                            <?php else: ?>
                                                <span class="text-muted">No ID Front Uploaded</span>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <label class="info-label">ID Picture (Back)</label><br>
                                            <?php if(!empty($id_back)): ?>
                                                <img src="<?= validate_image($id_back) ?>" alt="ID Back" class="img-fluid clickable-image" style="max-width:120px;max-height:120px;" onclick="openModal('<?= validate_image($id_back) ?>', 'ID Picture (Back)')">
                                            <?php else: ?>
                                                <span class="text-muted">No ID Back Uploaded</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <div class="info-details">
                                        <div class="mb-3">
                                            <div class="info-label">Student Name:</div>
                                            <div class="info-value"><?= ucwords($fullname) ?></div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="info-label">Student Number:</div>
                                            <div class="info-value"><?= $student_number ?></div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="info-label">Gender:</div>
                                            <div class="info-value"><?= ucwords($gender) ?></div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="info-label">Email:</div>
                                            <div class="info-value"><?= $email ?></div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="info-label">Department:</div>
                                            <div class="info-value"><?= ucwords($department) ?></div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="info-label">Course:</div>
                                            <div class="info-value"><?= ucwords($curriculum) ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mb-3 separator-line">
                    <div class="button-container">
                        <a href="./?page=my_archives" class="action-btn archives-btn">
                            <i class="fa fa-archive"></i> My Archives
                        </a>
                        <a href="./?page=manage_account" class="action-btn update-btn">
                            <i class="fa fa-edit"></i> Update Account
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="image-modal">
    <div class="modal-content">
        <div class="close-btn" onclick="closeModal()">&times;</div>
        <img id="modalImage" class="modal-image" src="" alt="">
    </div>
</div>

<script>
function openModal(imageSrc, title) {
    var modal = document.getElementById('imageModal');
    modal.style.display = 'flex';
    document.getElementById('modalImage').src = imageSrc;
}

function closeModal() {
    document.getElementById('imageModal').style.display = 'none';
}

// Close modal when clicking outside the image
window.onclick = function(event) {
    var modal = document.getElementById('imageModal');
    if (event.target == modal) {
        closeModal();
    }
}

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeModal();
    }
});
</script>