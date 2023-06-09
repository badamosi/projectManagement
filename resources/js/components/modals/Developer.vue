<template>
    
    <div class="modal fade" id="DeveloperForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable1 modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel4">{{ `${!editingForm ? 'Add' : 'Edit'} Developer` }}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i data-feather="x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="form-control-label">Name</label>
                    <input type="text" v-model="formData.name" class="form-control mg-b-10" placeholder="John Doe">
                    
                    <label class="form-control-label">Email</label>
                    <input type="email" v-model="formData.email" class="form-control mg-b-10" placeholder="example@gmail.com">
                    
                    <button @click="!editingForm ? handleSubmit() : handleUpdate()" class="btn btn-xs btn-primary">{{ `${!editingForm ? 'Save' : 'Update'} Developer` }}</button>

                </div>

            </div>
        </div>
    </div>
</template>

<script>
import { Api } from '../../utils/axios'


export default {
    data() {
        return {
            formData: {
                name: "",
                email: "",
            },
        }
    },
    props: ['data', 'editingForm'],
    watch: { 
        data: function () {
            this.formData = this.data
        },
    },
    methods: {
        handleSubmit(){
            Api.post("/developers", this.formData)
                .then(res => {
                    const { developer:newDeveloper} = res.data.data
                    let developers = this.$store?.state.developers
                    this.$store.commit('refreshDevelopers', [...developers, newDeveloper])

                    $("#DeveloperForm").modal('hide');
                    alert("Developer saved successfully")

                }).catch(error => {
                    if (error.response) {
                        let [key, value] = Object.entries(error.response.data.errors)[0]
                        alert(value[0])
                    }
                } );
        },

        handleUpdate() {

            Api.patch(`/developers/${this.formData.id}`, this.formData)
                .then(res => {
                    const { developer:newDeveloper} = res.data.data
                    let developers = this.$store?.state.developers

                    // find the index of the updated developer
                    let index = developers.findIndex(dev => dev.id === this.formData.id)

                    // updated developer using that index
                    developers[index] = newDeveloper

                    this.$store.commit('refreshDevelopers', developers)

                    
                    $("#DeveloperForm").modal('hide');
                    alert("Developer updated")
                }).catch(error => {
                    if (error.response) {
                        let [key, value] = Object.entries(error.response.data.errors)[0]
                        alert(value[0])
                    }
                } );


        },

    }
}
</script>
