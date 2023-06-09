<template>
    <tr>
        <th scope="row">1</th>
        <td>{{ data.name }}</td>
        <td>{{ data.description }}</td>
        <td>{{ data.end_date }}</td>
        <td>{{ data.end_date }}</td>
        <!-- <td>{{ data.developer.length }}</td> -->
        <td>
            <div class="mg-l-15">
                <button type="button" @click="editProject(data)" class="btn btn-success btn-icon">Edit</button>
                <button type="button" @click="deleteProject(data.id)" class="btn btn-danger btn-icon">Delete</button>
            </div>
        </td>
    </tr>
</template>

<script>
import { Api } from '../utils/axios';

export default {
    mounted() {
        console.log('Component mounted.')
    },
    props: ['data'],
    emits: ['update'],
    methods: {
        editProject(data) {
            this.$emit('update', data);
            $("#ProjectForm").modal('show');
        },
        deleteProject(id) {
            Api.delete(`projects/${id}`)
                .then(res => {
                    let projects = this.$store?.state.projects
                    projects = projects.filter(p => p.id != id)
                    this.$store.commit('refreshProjects', projects)
                }).catch(err => console.log(err));
        }

    }
}
</script>
