

<script src="Public/js/jquery.min.js"></script>
<script src="Public/js/bootstrap.js"></script>
<script src="Public/js/script.js"></script>

<script>
    $(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });

</script>

</body>
</html>