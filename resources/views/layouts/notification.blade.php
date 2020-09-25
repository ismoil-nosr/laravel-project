<div class="toast fade show" data-delay="5000" style="position: absolute; top: 0; right: 0; margin: 15px 15px 0 0; min-width:300px">
    <div class="toast-header">
        <svg class="bd-placeholder-img rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
            <rect width="100%" height="100%" fill="#04DA00"></rect>
        </svg>
        <strong class="mr-auto">Notification</strong>
        <small>now</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="toast-body text-center">
        {{ session('notify') }}
    </div>
</div>
<script>
    $('.toast').toast("show")

</script>
