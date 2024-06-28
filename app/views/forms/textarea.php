<script>
    tinymce.init({
        selector: '#description',
    });
</script>
<hr class="hr"/>
<h6>Description of Work</h6>
<textarea id="description"><?= $ticket['description'] ?></textarea>