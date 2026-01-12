<style>
    
    .projects-page .card {
        background: rgba(255, 255, 255, 0.95) !important;
        border: 1px solid rgba(63, 81, 181, 0.1) !important;
        box-shadow: 0 8px 32px rgba(63, 81, 181, 0.15) !important;
        border-radius: 20px !important;
    }
    
    .projects-page .card-outline.card-primary {
        border-color: #bbbcffff !important;
    }
    
    .projects-page .card-body {
        border-radius: 20px 20px 0 0 !important;
        background: rgba(231, 238, 255, 0.8) !important;
    }
    
    .projects-page .card-footer {
        background: rgba(99, 102, 241, 0.05) !important;
        border-top: 1px solid rgba(99, 102, 241, 0.1) !important;
        border-radius: 0 0 20px 20px !important;
    }
    
    .projects-page .card-body h2 {
        color: #2e2e93ff !important;
        font-weight: 600 !important;
        margin-bottom: 1rem !important;
    }
    
    .projects-page .bg-navy {
        background-color: #090936ff !important;
        height: 2px !important;
        border-radius: 2px !important;
    }
    
    .projects-page .list-group-item {
        border: 1px solid rgba(99, 102, 241, 0.1) !important;
        background: rgba(255, 255, 255, 0.9) !important;
        transition: all 0.3s ease !important;
        margin-bottom: 1rem !important;
        border-radius: 15px !important;
        box-shadow: 0 2px 8px rgba(99, 102, 241, 0.1) !important;
    }
    
    .projects-page .list-group-item:hover {
        background: rgba(255, 255, 255, 0.55) !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 6px 20px rgba(117, 119, 225, 0.6) !important;
        border-color: rgba(99, 102, 241, 0.2) !important;
    }
    
    .projects-page .text-navy {
        color: #2e2e93ff !important;
    }
    
    .projects-page .text-info {
        color: #5856eb !important;
    }
    
    .projects-page .banner-img {
        border-radius: 12px !important;
        border: 2px solid rgba(99, 102, 241, 0.1) !important;
        transition: all 0.3s ease !important;
    }
    
    .projects-page .list-group-item:hover .banner-img {
        border-color: rgba(99, 102, 241, 0.3) !important;
        transform: scale(1.02) !important;
    }
    
    .projects-page .pagination .page-link {
        color: #6366f1 !important;
        border-color: rgba(99, 102, 241, 0.2) !important;
        background: white !important;
        border-radius: 8px !important;
        margin: 0 2px !important;
    }
    
    .projects-page .pagination .page-link:hover {
        color: white !important;
        background: #6366f1 !important;
        border-color: #6366f1 !important;
        transform: scale(1.05) !important;
    }
    
    .projects-page .pagination .page-link.active {
        background: #6366f1 !important;
        border-color: #6366f1 !important;
        color: white !important;
    }
    
    .projects-page .text-muted {
        color: #6b7280 !important;
    }
    
    .projects-page .truncate-5 {
        color: #374151 !important;
        line-height: 1.6 !important;
    }
    
    .projects-page h3.text-center b {
        color: #6366f1 !important;
    }
</style>

<div class="projects-page">
<div class="content py-2">
    <div class="col-12">
        <div class="card card-outline card-primary shadow">
            <div class="card-body">
                <h2>Archive List</h2>
                <hr class="bg-navy">
                <?php 
                $limit = 10;
                $page = isset($_GET['p'])? $_GET['p'] : 1; 
                $offset = 10 * ($page - 1);
                $paginate = " limit {$limit} offset {$offset}";
                $isSearch = isset($_GET['q']) ? "&q={$_GET['q']}" : "";
                $search = "";
                if(isset($_GET['q'])){
                    $keyword = $conn->real_escape_string($_GET['q']);
                    $search = " and (title LIKE '%{$keyword}%' or abstract  LIKE '%{$keyword}%' or members LIKE '%{$keyword}%' or curriculum_id in (SELECT id from curriculum_list where name  LIKE '%{$keyword}%' or description  LIKE '%{$keyword}%') or curriculum_id in (SELECT id from curriculum_list where department_id in (SELECT id FROM department_list where name  LIKE '%{$keyword}%' or description  LIKE '%{$keyword}%'))) ";
                }
                $students = $conn->query("SELECT * FROM `student_list` where id in (SELECT student_id FROM archive_list where `status` = 1 {$search})");
                $student_arr = array_column($students->fetch_all(MYSQLI_ASSOC),'email','id');
                $count_all = $conn->query("SELECT * FROM archive_list where `status` = 1 {$search}")->num_rows;    
                $pages = ceil($count_all/$limit);
                $archives = $conn->query("SELECT *, IFNULL(download_count, 0) as download_count FROM archive_list where `status` = 1 {$search} order by unix_timestamp(date_created) desc {$paginate}");    
                ?>
                <?php if(!empty($isSearch)): ?>
                <h3 class="text-center"><b>Search Result for "<?= $keyword ?>" keyword</b></h3>
                <?php endif ?>
                <div class="list-group">
                    <?php 
                    while($row = $archives->fetch_assoc()):
                        $row['abstract'] = strip_tags(html_entity_decode($row['abstract']));
                    ?>
                    <a href="./?page=view_archive&id=<?= $row['id'] ?>" class="text-decoration-none text-dark list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-lg-4 col-md-5 col-sm-12 text-center">
                                <img src="<?= validate_image($row['banner_path']) ?>" class="banner-img img-fluid bg-gradient-dark" alt="Banner Image">
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-12">
                                <h3 class="text-navy"><b><?php echo $row['title'] ?></b></h3>
                                <small class="text-muted">By <b class="text-info"><?= isset($student_arr[$row['student_id']]) ? $student_arr[$row['student_id']] : "N/A" ?></b></small>
                                <p class="truncate-5"><?= $row['abstract'] ?></p>
                                
                                <!-- Action buttons for logged-in vs guests -->
                                <div class="mt-3">
                                    <?php if($_settings->userdata('id') > 0): ?>
                                        <!-- Full access for logged-in users -->
                                        <span class="badge badge-primary mr-2">
                                            <i class="fas fa-eye mr-1"></i>View Details
                                        </span>
                                        <span class="badge badge-success">
                                            <i class="fas fa-download mr-1"></i><?= number_format($row['download_count']) ?> Downloads
                                        </span>
                                    <?php else: ?>
                                        <!-- Limited access for guests -->
                                        <span class="badge badge-primary mr-2">
                                            <i class="fas fa-eye mr-1"></i>View Details
                                        </span>
                                        <span class="badge badge-secondary" title="Login required to download">
                                            <i class="fas fa-lock mr-1"></i>Login to Download
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="card-footer clearfix">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6"><span class="text-muted">Display Items: <?= $archives->num_rows ?></span></div>
                        <div class="col-md-6">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="./?page=projects<?= $isSearch ?>&p=<?= $page - 1 ?>" <?= $page == 1 ? 'disabled' : '' ?>>«</a></li>
                                <?php for($i = 1; $i<= $pages; $i++): ?>
                                <li class="page-item"><a class="page-link <?= $page == $i ? 'active' : '' ?>" href="./?page=projects<?= $isSearch ?>&p=<?= $i ?>"><?= $i ?></a></li>
                                <?php endfor; ?>
                                <li class="page-item"><a class="page-link" href="./?page=projects<?= $isSearch ?>&p=<?= $page + 1 ?>" <?= $page == $pages ? 'disabled' : '' ?>>»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
