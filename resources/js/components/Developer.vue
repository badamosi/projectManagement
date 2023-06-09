<template>
    <div class="col">
        <div class="card card-people">
            <div class="card-body media">
                <div class="avatar avatar-md avatar-online"><img src="http://themepixels.me/demo/cassie/assets/img/img5.jpg" class="rounded-circle" alt="">
                </div>
                <div class="media-body">
                    <h6>Esther Glassman</h6>
                    <p>Product Designer at <a href="">Themepixels, Inc.</a></p>
                </div><!-- media-body -->
            </div><!-- card-body -->
            <div class="card-footer">
                <a href=""><span class="tx-medium">21</span> mutual friends</a>
                <nav class="nav nav-icon">
                    <a href="" class="nav-link text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-user-plus">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <line x1="20" y1="8" x2="20" y2="14"></line>
                            <line x1="23" y1="11" x2="17" y2="11"></line>
                        </svg><span class="d-none d-sm-inline"> Add as Friend</span></a>
                    <a href="" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-more-vertical">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="12" cy="5" r="1"></circle>
                            <circle cx="12" cy="19" r="1"></circle>
                        </svg></a>
                </nav>
        </div><!-- card-footer -->
    </div><!-- card -->
</div></template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
