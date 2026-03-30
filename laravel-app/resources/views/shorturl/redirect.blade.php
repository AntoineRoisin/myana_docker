@if (!$is_deleted)
<script>
    window.open("{{ $url }}", '_blank');
</script>
@else
<p>le lien n'est plus valide</p>
@endif
