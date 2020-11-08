
<script src="http://code.jquery.com/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.slim.min.js"><\/script>')</script><script src="<?php echo Base_url() ?>/public/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo Base_url() ?>/public/js/feather.min.js"></script>
    <script src="<?php echo Base_url() ?>/public/js/docs.min.js"></script>
    <script src="<?php echo Base_url() ?>/public/js/docsearch.min.js"></script>
<script src="<?php echo Base_url() ?>/public/js/menu.js"></script>
<?php
if ($script){
    foreach ($script as $js){
        echo '<script src="'.$js.'"></script>';
    }
}
?>
</main>
        <footer class="footer mt-auto py-3 col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="container">
                <span class="text-muted">Todos los derechos reservados a Victor Nieto.</span>
            </div>
        </footer>



        </body>
    </div>
</div>


</html>

