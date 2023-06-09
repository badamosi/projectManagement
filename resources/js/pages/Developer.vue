<template>
    <Layout>
        <div class="content-body">

            <div class="row row-sm mg-t-15 mg-sm-t-20 w-100 p-0">

                <button @click="addDev" type="button" class="btn btn-xs btn-primary">Add Developer</button>

                <div class="table-responsive">
                    <table class="table mg-b-0">
                        <thead class="thead-dark1">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <Developer @update="handleUpdate" v-for="(dev, i) in developers" :key="i" :data="dev" />
                        </tbody>
                    </table>
                </div>

            </div><!-- row -->
        </div>
        <DeveloperModalForm :data="selectedDeveloper" :editingForm="editingForm" />
    </Layout>
    <!-- DeveloperForm -->
</template>

<script>

import Layout from '../components/Layout.vue'
import Developer from '../components/Developer.vue'
import DeveloperModalForm from '../components/modals/Developer.vue'
import { Api } from '../utils/axios'



export default {
    mounted() {
        this.fetchDevelopers()
    },
    components: { Layout, Developer, DeveloperModalForm },
    data() {
        return {
            editingForm: false,
            selectedDeveloper: {}
        }
    },
    computed: {
        developers() {
            return this.$store?.state.developers
        }
    },
    methods: {
        fetchDevelopers() {
            Api.get('/developers')
                .then((res) => {
                    const { developers } = res.data.data
                    this.$store.commit('refreshDevelopers', developers)
                }).catch(err => console.log(err))
        },

        handleUpdate(payload) {
            this.selectedDeveloper = payload
            this.editingForm = true
        },

        addDev() {
            this.editingForm = false
            this.selectedDeveloper = {}
            $("#DeveloperForm").modal('show');
        },

    }
}
</script>
