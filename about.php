<style>

    
    .about-page .card {
        background: rgba(255, 255, 255, 0.95) !important;
        border: 1px solid rgba(63, 81, 181, 0.1) !important;
        box-shadow: 0 8px 32px rgba(63, 81, 181, 0.15) !important;
        border-radius: 20px !important;
        transition: all 0.3s ease !important;
    }
    
    .about-page .card:hover {
        transform: translateY(-5px) !important;
        box-shadow: 0 12px 40px rgba(105, 127, 255, 0.35) !important;
    }
    
    .about-page .card-outline.card-navy {
        border-color: #2e2e93ff !important;
    }
    
    .about-page .card-header {
        background: #2e2e93ff !important;
        color: white !important;
        border-radius: 20px 20px 0 0 !important;
        border-bottom: 1px solid rgba(99, 102, 241, 0.2) !important;
    }
    
    .about-page .card-body {
        border-radius: 20px !important;
        background: rgba(248, 250, 255, 0.8) !important;
        padding: 2rem !important;
    }
    
    .about-page .card-title {
        font-weight: 600 !important;
        margin: 0 !important;
        font-size: 1.25rem !important;
    }
    
    .about-page h2 {
        color: #2e2e93ff !important;
        font-weight: 600 !important;
        margin-bottom: 1rem !important;
    }
    
    .about-page .bg-navy {
        background-color: #2e2e93ff !important;
        height: 3px !important;
        border-radius: 3px !important;
    }
    
    .about-page .border-navy {
        border-color: #6366f1 !important;
    }
    
    .about-page dt {
        color: #2e2e93ff !important;
        font-weight: 600 !important;
        margin-bottom: 0.5rem !important;
        font-size: 1rem !important;
    }
    
    .about-page dd {
        color: #374151 !important;
        margin-bottom: 1.5rem !important;
        font-size: 1rem !important;
        line-height: 1.6 !important;
        padding-left: 1.5rem !important;
    }
    
    .about-page .text-muted {
        color: #6366f1 !important;
    }
    
    .about-page dl {
        margin-bottom: 0 !important;
    }
    
    .about-page .fa {
        margin-right: 0.5rem !important;
        color: #6366f1 !important;
    }
</style>

<div class="about-page">
<div class="col-12">
    <div class="row my-5 ">
        <div class="col-md-5">
            <div class="card card-outline card-navy shadow">
                <div class="card-header">
                    <h4 class="card-title">Contact</h4>
                </div>
                <div class="card-body">
                    <dl>
                        <dt class="text-muted"><i class="fa fa-envelope"></i> Email</dt>
                        <dd class="pr-4"><?= $_settings->info('email') ?></dd>
                        <dt class="text-muted"><i class="fa fa-phone"></i> Contact #</dt>
                        <dd class="pr-4"><?= $_settings->info('contact') ?></dd>
                        <dt class="text-muted"><i class="fa fa-map-marked-alt"></i> Location</dt>
                        <dd class="pr-4"><?= $_settings->info('address') ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card card-outline card-navy shadow">
                <div class="card-body">
                    <h2 class="text-center">About</h2>
                    <center><hr class="bg-navy border-navy w-25 border-2"></center>
                    <div>
                        <?= file_get_contents("about_us.html") ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>