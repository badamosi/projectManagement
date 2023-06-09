import {createStore } from 'vuex'
import router from "../router";


const store = createStore({
    state () {
      return {
        projects: [],
        developers: [],
        selectedProject: {},
        selectedDeveloper: {},
      }
    },
    mutations: {

      refreshProjects(state, projects){
        state.projects = projects;
      },

      refreshDevelopers(state, developers){
        state.developers = developers;
      },


    }
  })

  export default store;