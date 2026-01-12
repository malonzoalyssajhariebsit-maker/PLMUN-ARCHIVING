<style>
    .car-cover{
        width:10em;
    }
    .car-item .col-auto{
        max-width: calc(100% - 12em) !important;
    }
    .car-item:hover{
        transform:translate(0, -4px);
        background:#a5a5a521;
    }
    .banner-img-holder{
        height:25vh !important;
        width: calc(100%);
        overflow: hidden;
    }
    .banner-img{
        object-fit:scale-down;
        height: calc(100%);
        width: calc(100%);
        transition:transform .3s ease-in;
    }
    .car-item:hover .banner-img{
        transform:scale(1.3)
    }
    .welcome-content img{
        margin:.5em;
    }

    /* Simple welcome card styling */
    .card-outline.card-navy {
        border: 1px solid rgba(99, 102, 241, 0.2) !important;
        border-radius: 20px !important;
        transition: all 0.3s ease !important;
    }

    .card-outline.card-navy:hover {
        transform: translateY(-4px) !important;
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.2) !important;
        border-color: rgba(99, 102, 241, 0.3) !important;
    }

    .card-body {
        border-radius: 20px !important;
    }

    /* Feature Cards Styling */
    .features-section {
        margin-top: 3rem;
    }

    .feature-card {
        background: rgba(255, 255, 255, 0.95) !important;
        border: 1px solid rgba(99, 102, 241, 0.15) !important;
        border-radius: 20px !important;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.1) !important;
        transition: all 0.3s ease !important;
        height: 100% !important;
        overflow: hidden !important;
    }

    .feature-card:hover {
        transform: translateY(-5px) !important;
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.2) !important;
        border-color: rgba(99, 102, 241, 0.25) !important;
    }

    .feature-card-body {
        padding: 1.5rem !important;
        text-align: center !important;
        background: rgba(248, 250, 255, 0.8) !important;
        border-radius: 20px !important;
    }

    .feature-icon i {
        font-size: 2.5rem !important;
        color: #3a6235ff !important;
    }

    .feature-title {
        color: #3a6235ff !important;
        font-size: 1.2rem !important;
        font-weight: 600 !important;
        margin-bottom: 1rem !important;
        line-height: 1.4 !important;
    }

    .feature-description {
        color: #6b7280 !important;
        font-size: 0.95rem !important;
        line-height: 1.6 !important;
        margin-bottom: 0 !important;
    }

    @media (max-width: 768px) {
        .feature-card {
            margin-bottom: 1.5rem !important;
        }
    }
</style>
<div class="col-lg-12 py-5">
    <div class="contain-fluid">
        <div class="card card-outline card-navy shadow rounded-0">
            <div class="card-body rounded-0">
                <div class="container-fluid">
                    <h3 class="text-center">Welcome</h3>
                    <hr>
                    <div class="welcome-content">
                        <?php include("welcome.html") ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature Cards Section -->
        <div class="features-section">
            <div class="row">
                <!-- Card 1: Institutional Research Repository -->
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="feature-card">
                        <div class="feature-card-body">
                            <div class="feature-icon">
                                <i class="fas fa-database"></i>
                            </div>
                            <h5 class="feature-title">Institutional Research Repository</h5>
                            <p class="feature-description">A centralized digital repository for the preservation and management of academic research outputs.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Structured Research Access -->
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="feature-card">
                        <div class="feature-card-body">
                            <div class="feature-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <h5 class="feature-title">Structured Research Access</h5>
                            <p class="feature-description">Provides organized and efficient access to approved theses, capstone projects, and scholarly papers.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Academic Integrity and Quality Assurance -->
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="feature-card">
                        <div class="feature-card-body">
                            <div class="feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h5 class="feature-title">Academic Integrity and Quality Assurance</h5>
                            <p class="feature-description">Supports originality and research standards through systematic review and verification processes.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Scholarly Learning Support -->
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="feature-card">
                        <div class="feature-card-body">
                            <div class="feature-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <h5 class="feature-title">Scholarly Learning Support</h5>
                            <p class="feature-description">Enhances academic learning by offering credible references to support research and study activities.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>