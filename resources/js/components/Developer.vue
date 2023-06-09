<template>
    <tr>
        <th scope="row">1</th>
        <td>{{ data.name }}</td>
        <td>{{ data.email }}</td>
        <td>
            <div class="mg-l-15">
                <button type="button" @click="editDeveloper(data)" class="btn btn-success btn-icon">Edit</button>
                <button type="button" @click="deleteDeveloper(data.id)" class="btn btn-danger btn-icon">Delete</button>
            </div>
        </td>
    </tr>
</template>

<script>
import { Api } from '../utils/axios';

export default {
    props: ['data'],
    emits: ['update'],
    methods: {
        editDeveloper(data) {
            this.$emit('update', data);
            $("#DeveloperForm").modal('show');
        },
        deleteDeveloper(id) {
            Api.delete(`developers/${id}`)
                .then(res => {
                    // Updating the state after delete
                    let developers = this.$store?.state.developers
                    developers = developers.filter(p => p.id != id)
                    this.$store.commit('refreshDevelopers', developers)
                }).catch(err => console.log(err));
        }

    }
}
</script>
