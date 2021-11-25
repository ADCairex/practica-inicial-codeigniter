<?= $this->extend('PublicSection/base_layout') ?>

<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('assets/PublicSection/css/home.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <script type='text/javascript'>

        $(document).ready(() => {

        });

    </script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="sign-in-div">
        <h1>Festivales</h1>
            <div class="festival-mainContent">
                <div class="festival-group-card">
                    <h2>Indie</h2>
                    <div class='festival-content'>
                        <div class="festival-card">
                            <img src="<?= base_url('assets/PublicSection/images/indieFestival.jpg') ?>" width="300" height="200">
                            <h3>Card title</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pharetra molestie gravida.</p>
                            <button class='btn btn-primary'>Go somewhere</button>
                        </div>
                        <div class="festival-card">
                            <img src="<?= base_url('assets/PublicSection/images/indieFestival.jpg') ?>" width="300" height="200">
                            <h3>Card title</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pharetra molestie gravida.</p>
                            <button class='btn btn-primary'>Go somewhere</button>
                        </div>
                        <div class="festival-card">
                            <img src="<?= base_url('assets/PublicSection/images/indieFestival.jpg') ?>" width="300" height="200">
                            <h3>Card title</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pharetra molestie gravida.</p>
                            <button class='btn btn-primary'>Go somewhere</button>
                        </div>
                        <div class="festival-card">
                            <img src="<?= base_url('assets/PublicSection/images/indieFestival.jpg') ?>" width="300" height="200">
                            <h3>Card title</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pharetra molestie gravida.</p>
                            <button class='btn btn-primary'>Go somewhere</button>
                        </div>
                    </div>
                </div>
                <div class="festival-group-card">
                    <h2>Rock</h2>
                    <div class='festival-content'>
                        <div class="festival-card">
                            <img src="<?= base_url('assets/PublicSection/images/rockFestival.jpeg') ?>" width="300" height="200">
                            <h3>Card title</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pharetra molestie gravida.</p>
                            <button class='btn btn-primary'>Go somewhere</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?= $this->endSection() ?>