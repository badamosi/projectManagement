<template>
    <Layout>
        <div class="content-body">

            <div class="row row-sm mg-t-15 mg-sm-t-20 w-100 p-0">

                <button @click="addProject" type="button" class="btn btn-xs btn-primary">Add Project</button>

                <div class="table-responsive">
                    <table class="table mg-b-0">
                        <thead class="thead-dark1">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">End Date</th>
                                <th scope="col">No. of Developers</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <Project @update="handleUpdate" v-for="(project, i) in projects" :key="i" :data="project" />
                        </tbody>
                    </table>
                </div>

            </div><!-- row -->
        </div>
        <ProjectModalForm :data="selectedProject" :editingForm="editingForm" />
    </Layout>
    <!-- ProjectForm -->
</template>

<script>

import Layout from '../components/Layout.vue'
import Project from '../components/Project.vue'
import ProjectModalForm from '../components/modals/Project.vue'
import { Api } from '../utils/axios'



export default {
    mounted() {
        this.fetchProjects()
    },
    components: { Layout, Project, ProjectModalForm },
    data() {
        return {
            editingForm: false,
            selectedProject: {}
        }
    },
    computed: {
        projects() {
            return this.$store?.state.projects
        }
    },
    methods: {
        fetchProjects() {
            Api.get('/projects')
                .then((res) => {
                    const { projects } = res.data.data
                    this.$store.commit('refreshProjects', projects)
                }).catch(err => console.log(err))
        },

        handleUpdate(payload) {
            this.selectedProject = payload
            this.editingForm = true
        },

        addProject() {
            this.editingForm = false
            this.selectedProject = {}
            $("#ProjectForm").modal('show');
        },

    }
}
</script>
