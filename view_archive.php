<?php 
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT a.*, s.email, CONCAT(s.lastname,', ', s.firstname, ' ', s.middlename) as fullname, d.name as department, c.name as curriculum FROM `archive_list` a inner join student_list s on a.student_id = s.id inner join department_list d on s.department_id = d.id inner join curriculum_list c on s.curriculum_id = c.id where a.id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        foreach($qry->fetch_array() as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
}
?>
<style>
    .archive-img{
        object-fit:cover;
        object-position:center center;
        height:40vh;
        width:calc(100%);
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.15);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .archive-img:hover {
        transform: scale(1.02);
        box-shadow: 0 12px 35px rgba(99, 102, 241, 0.25);
    }



    .view-container {
        background: rgba(76, 87, 45, 0.95);
        border-radius: 25px;
        padding: 2rem;
        box-shadow: 0 8px 32px rgba(63, 81, 181, 0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(63, 81, 181, 0.1);
    }

    .view-card {
        background: rgba(248, 250, 255, 0.8);
        border: 1px solid rgba(99, 102, 241, 0.1) !important;
        border-radius: 20px !important;
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.1);
        overflow: hidden;
    }

    .view-title {
        color: #fbffc7ff !important;
        font-size: 2.5rem;
        font-weight: 600;
        margin-bottom: 2rem;
        text-align: center;
    }

    .view-section {
        padding: 2rem;
    }

    .info-label {
        color: #1d3c0dff;
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 0.75rem;
        margin-top: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-value {
        background: rgba(255, 255, 255, 0.9);
        color: #374151;
        font-size: 1rem;
        font-weight: 500;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        margin-bottom: 1rem;
        line-height: 1.6;
        border: 1px solid rgba(99, 102, 241, 0.2);
    }

    .btn-back {
        background: linear-gradient(135deg, #6366f1, #5856eb) !important;
        border: none !important;
        border-radius: 12px !important;
        padding: 12px 24px !important;
        font-weight: 600;
        color: white;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
        transition: all 0.4s ease;
        text-decoration: none;
    }

    .btn-back:hover {
        background: linear-gradient(135deg, #5856eb, #4f46e5) !important;
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
        transform: translateY(-2px);
        color: white;
    }

    .btn-edit {
        background: linear-gradient(135deg, #10b981, #059669) !important;
        border: none !important;
        border-radius: 12px !important;
        padding: 12px 24px !important;
        font-weight: 600;
        color: white;
        transition: all 0.4s ease;
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
    }

    .btn-edit:hover {
        background: linear-gradient(135deg, #059669, #047857) !important;
        transform: translateY(-2px);
        color: white;
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
    }

    .btn-download {
        background: linear-gradient(135deg, #f59e0b, #d97706) !important;
        border: none !important;
        border-radius: 12px !important;
        padding: 12px 24px !important;
        font-weight: 600;
        color: white;
        transition: all 0.4s ease;
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
    }

    .btn-download:hover {
        background: linear-gradient(135deg, #d97706, #b45309) !important;
        transform: translateY(-2px);
        color: white;
        box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
    }

    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem;
        background: rgba(199, 205, 219, 0.8);
        border-radius: 15px;
        margin-bottom: 2rem;
        border: 1px solid rgba(99, 102, 241, 0.1);
    }

    .button-group {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 2rem;
    }

    .download-stats {
        background: linear-gradient(135deg, rgba(1, 2, 57, 0.1), rgba(139, 92, 246, 0.1));
        border: 1px solid rgba(99, 102, 241, 0.2);
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .download-count {
        font-size: 1.5rem;
        font-weight: bold;
        color: #6366f1;
        margin-bottom: 0.25rem;
    }

    .download-label {
        color: #6b7280;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    @media (max-width: 768px) {
        .view-container {
            margin: 1rem;
            padding: 1.5rem;
        }
        
        .view-title {
            font-size: 1.8rem;
        }
        
        .view-section {
            padding: 1rem;
        }

        .button-group {
            flex-direction: column;
            align-items: center;
        }
    }
</style>

<div class="content py-4">
    <div class="container-fluid">
        <div class="view-container">
            <div class="text-center mb-4">
                <h1 class="view-title"><?= isset($title) ? $title : "Archive Details" ?></h1>
            </div>
            <div class="view-card">
                <div class="view-section">
                    <?php if(isset($banner_path) && !empty($banner_path)): ?>
                    <div class="image-container">
                        <img src="<?= validate_image($banner_path) ?>" alt="Archive Banner" class="archive-img">
                    </div>
                    <?php endif; ?>
                    
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <!-- Download Statistics -->
                            <div class="download-stats">
                                <div class="download-count"><?= isset($download_count) ? number_format($download_count) : "0" ?></div>
                                <div class="download-label">Total Downloads</div>
                            </div>
                            
                            <div class="info-details">
                                <div class="mb-3">
                                    <div class="info-label">Archive Code:</div>
                                    <div class="info-value"><?= isset($archive_code) ? $archive_code : "N/A" ?></div>
                                </div>
                                <div class="mb-3">
                                    <div class="info-label">Year:</div>
                                    <div class="info-value"><?= isset($year) ? $year : "N/A" ?></div>
                                </div>
                                <div class="mb-3">
                                    <div class="info-label">Author:</div>
                                    <div class="info-value"><?= isset($fullname) ? ucwords($fullname) : "N/A" ?></div>
                                </div>
                                <div class="mb-3">
                                    <div class="info-label">Department:</div>
                                    <div class="info-value"><?= isset($department) ? ucwords($department) : "N/A" ?></div>
                                </div>
                                <div class="mb-3">
                                    <div class="info-label">Course:</div>
                                    <div class="info-value"><?= isset($curriculum) ? ucwords($curriculum) : "N/A" ?></div>
                                </div>
                                <?php if(isset($abstract) && !empty($abstract)): ?>
                                <div class="mb-3">
                                    <div class="info-label">Abstract:</div>
                                    <div class="info-value"><?= html_entity_decode($abstract) ?></div>
                                </div>
                                <?php endif; ?>
                                <?php if(isset($members) && !empty($members)): ?>
                                <div class="mb-3">
                                    <div class="info-label">Project Members:</div>
                                    <div class="info-value"><?= html_entity_decode($members) ?></div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="button-group">
                        <a href="./?page=projects" class="btn btn-back">
                            <i class="fa fa-arrow-left"></i> Back to Projects
                        </a>
                        <?php if(isset($student_id) && $student_id == $_settings->userdata('id')): ?>
                        <a href="./?page=submit-archive&id=<?= isset($id) ? $id : '' ?>" class="btn btn-edit">
                            <i class="fa fa-edit"></i> Edit Archive
                        </a>
                        <?php endif; ?>
                        
                        <!-- Download button with tracking -->
                        <?php if(isset($document_path) && !empty($document_path)): ?>
                            <?php if($_settings->userdata('id') > 0): ?>
                                <button onclick="trackDownload(<?= $id ?>, '<?= validate_image($document_path) ?>')" class="btn btn-download">
                                    <i class="fa fa-download"></i> Download Document
                                </button>
                            <?php else: ?>
                                <button class="btn btn-download" onclick="showLoginPrompt()" style="opacity: 0.7; cursor: not-allowed;">
                                    <i class="fa fa-lock"></i> Login to Download
                                </button>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Login prompt for guests -->
                    <?php if($_settings->userdata('id') <= 0 && isset($document_path) && !empty($document_path)): ?>
                    <div class="alert alert-info mt-3" style="background: rgba(99, 101, 241, 0.35); border: 1px solid rgba(99, 102, 241, 0.2); border-radius: 12px;">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-info-circle mr-2" style="color: #e70000ff;"></i>
                            <div>
                                <strong>Download Restricted:</strong> Please 
                                <a href="./login.php" style="color: #375cffff; font-weight: bold;">login</a> or 
                                <a href="./register.php" style="color: #3e42ffff; font-weight: bold;">register</a> 
                                to download this document.
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showLoginPrompt() {
    if(confirm('You need to login to download this document. Would you like to go to the login page?')) {
        window.location.href = './login.php';
    }
}



//DOWNLOAD TRACKING FUNCTION
function trackDownload(archiveId, documentUrl) {
    console.log('Starting download tracking for archive:', archiveId);
    console.log('Document URL:', documentUrl);
    
    // Show loading indicator
    const downloadBtn = event.target;
    const originalText = downloadBtn.innerHTML;
    downloadBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Processing...';
    downloadBtn.disabled = true;
    
    // Track the download with AJAX
    $.ajax({
        url: './classes/Master.php?f=track_download',
        method: 'POST',
        data: { archive_id: archiveId },
        dataType: 'json',
        success: function(response) {
            console.log('Server response:', response);
            
            if(response && response.status === 'success') {
                // Update the download count display
                const currentCount = parseInt($('.download-count').text().replace(/,/g, '')) || 0;
                $('.download-count').text((currentCount + 1).toLocaleString());
                
                // Start the actual download
                window.open(documentUrl, '_blank');
                
                // Show success message briefly
                downloadBtn.innerHTML = '<i class="fa fa-check"></i> Download Started!';
                
            } else {
                console.error('Server error:', response);
                alert('Error tracking download: ' + (response ? response.msg : 'Unknown error'));
                // Still allow download even if tracking fails
                window.open(documentUrl, '_blank');
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
            console.log('Response text:', xhr.responseText);
            alert('Network error occurred, but download will proceed.');
            // Even if tracking fails, allow download
            window.open(documentUrl, '_blank');
        },
        complete: function() {
            // Reset button after delay
            setTimeout(function() {
                downloadBtn.innerHTML = originalText;
                downloadBtn.disabled = false;
            }, 2000);
        }
    });
}
//DOWNLOAD TRACKING FUNCTION.........
</script>