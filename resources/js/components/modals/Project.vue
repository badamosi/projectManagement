<template>
    
    <div class="modal fade" id="ProjectForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable1 modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel4">{{ `${!editingForm ? 'Add' : 'Edit'} Project` }}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i data-feather="x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="form-control-label">Project Name</label>
                    <input type="text" v-model="formData.name" class="form-control mg-b-10" placeholder="Project Name">
                    
                    <label class="form-control-label">Description</label>
                    <textarea class="form-control mg-b-10" v-model="formData.description" rows="2" placeholder="Description"></textarea>


                    <div class="mg-b-10">
                        <Multiselect
                        v-model="value"
                        :options="developers"
                        label="name"
                        valueProp="id"
                        mode="multiple"
                        placeholder="Assign Developers"
                        :close-on-select="false"
                        />
                    </div>
                    <div class="row mg-b-10">
                        <div class="col-sm-6">
                            <label class="form-control-label">Start Date</label>
                            <input type="date" v-model="formData.start_date" class="form-control" placeholder="Input box">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-control-label">End Date</label>
                            <input type="date" v-model="formData.end_date" class="form-control" placeholder="Input box">
                        </div>
                    </div>

                    <label class="form-control-label">Status</label>
                    <select v-model="formData.status" class="custom-select mg-b-10">
                        <option v-for="(stat, i) in projectStatus" value="1">{{stat}}</option>
                    </select>

                    <button @click="!editingForm ? handleSubmit() : handleUpdate()" class="btn btn-xs btn-primary">{{ `${!editingForm ? 'Save' : 'Update'} Project` }}</button>

                    
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
                    $("#ProjectForm").modal('hide');

                    alert("New project saved successfully")

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
                    $("#ProjectForm").modal('hide');

                    alert("Update Successful")

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
