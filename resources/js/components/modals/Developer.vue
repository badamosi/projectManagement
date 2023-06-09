<template>
    <div class="modal fade" id="EmployeeForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel4">{{ `${!editingForm ? 'Add' : 'Edit'} Developer` }}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i data-feather="x"></i></span>
                    </button>
                </div>
                <div class="modal-body">

                </div>

            </div>
        </div>
    </div>
</template>

<script>

export default {
    mounted() {
        console.log("mounted")
    },
    data() {
        return {
            editingForm: false,
            formData: {

            },
        }
    },
    methods: {
    }
}
</script>
