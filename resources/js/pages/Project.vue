<template>
    <Layout>
        <div>
        <div class="content-header">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item"><a href="#">User Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">People Directory</li>
                    </ol>
                </nav>
                <h4 class="content-title content-title-sm">People Directory</h4>
            </div>
        </div>
        <div class="content-body">
            <!-- <div class="d-flex align-items-center justify-content-between mg-b-15">
                <h6 class="tx-uppercase tx-bold tx-spacing-1 tx-13 mg-b-0">Most Recent Updates</h6>
                <div class="btn-group">
                    <button class="btn btn-white btn-xs btn-icon" disabled=""><i class="icon ion-chevron-left"></i></button>
                    <button class="btn btn-white btn-xs btn-icon"><i class="icon ion-chevron-right"></i></button>
                </div>
            </div> -->

            <div class="people-list people-list-one">
                <div class="people-list-body">
                    <div class="row row-xs">
                        <!-- Developers -->

                        <Project v-for="dev in 3" />

                    </div><!-- row -->
                </div><!-- people-list-body -->
            </div><!-- people-list -->

            <hr class="mg-lg-y-25 op-0">

        </div>
    </div>
    </Layout>
</template>

<script>

import Layout from '../components/Layout.vue'
import Project from '../components/Project.vue'



export default {
    mounted() {
        console.log('Component mounted.')
    },
    components: { Layout, Project },
}
</script>
