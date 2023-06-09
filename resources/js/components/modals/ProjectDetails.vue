<template>
    
    <div class="modal fade" id="ProjectDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable1 modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel4">Project Details</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i data-feather="x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <h4>Project Name: {{ data.name }}</h4>
                    <p>Description: {{ data.description }}</p>

                    <table class="table bordered">
                        <th>SN</th>
                        <th>Developer Name</th>
                        <th>Email</th>
                        <tbody>
                            <tr v-for="(dev, i) in data?.developers">
                                <td>{{ i+1 }}</td>
                                <td>{{ dev.name }}</td>
                                <td>{{ dev.email }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Multiselect from '@vueform/multiselect'
import { Api } from '../../utils/axios'


export default {
    data() {
        return {
            formData: {
                name: "",
                description: "",
                state_date: "",
                end_date: "",
                status: ""
            },
            developers: [],
            value: [],
            projectStatus: ['overdue', 'ongoing', 'completed']

        }
    },
    mounted(){
        this.fetchDevelopers()
    },
    components: {
      Multiselect,
    },
    props: ['data', 'editingForm'],
    watch: { 
        data: function () {
            this.formData = this.data
            let selectedDeveloprs = this.data?.developers
            this.value = this.data?.developers ? selectedDeveloprs.map(obj => obj.id) : []
        },
    },
    methods: {
        handleSubmit(){
            let data
            data = {...this.formData, developer_ids : this.value}
            Api.post("/projects", data)
                .then(res => {
                    const { project:newProject} = res.data.data
                    let projects = this.$store?.state.projects
                    this.$store.commit('refreshProjects', [...projects, newProject])

                    alert("New project saved successfully")

                    $("#ProjectForm").modal('hide');
                }).catch(error => {
                    if (error.response) {
                        let [key, value] = Object.entries(error.response.data.errors)[0]
                        alert(value[0])
                    }
                } );
        },

        handleUpdate() {

            let data
            data = {...this.formData, developer_ids : this.value}
            Api.patch(`/projects/${this.formData.id}`, data)
                .then(res => {
                    const { project:newProject} = res.data.data
                    let projects = this.$store?.state.projects

                    // find the index of the updated developer
                    let index = projects.findIndex(prj => prj.id === this.formData.id)

                    // updated developer using that index
                    projects[index] = newProject

                    this.$store.commit('refreshProjects', projects)

                    alert("Update Successful")

                    $("#ProjectForm").modal('hide');
                }).catch(error => {
                    if (error.response) {
                        let [key, value] = Object.entries(error.response.data.errors)[0]
                        alert(value[0])
                    }
                } );


        },

        fetchDevelopers(){
            Api.get("/developers")
                .then(res => {
                    const { developers } = res.data.data
                    console.log(developers)
                    this.developers = developers
                }).catch(err => console.log(err) );
        }
    }
}
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
