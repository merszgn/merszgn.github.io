<footer>
    <?php
        wp_footer();  // This allows WordPress to load necessary scripts and plugins in the footer
        ?>
</footer>
<script>
const menuItems = document.querySelectorAll('.menu-list > li');
menuItems.forEach(item => {
    item.addEventListener('click', function(e) {
        e.stopPropagation();
        this.classList.toggle('open');
    });
});
</script>
</body>

</html>