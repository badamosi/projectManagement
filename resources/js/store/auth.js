import axios from "axios";
import router from "../router";

const auth = {
  namespaced: true,
  state: {
    user: null,
    access_token: null,
    isAuthenticated: false,
    selectedWard: null,
  },
  getters: {},
  mutations: {
    loginUser(state, value) {
      state.access_token = value.data.token;
      state.isAuthenticated = true;
      state.user = value.data.user;
    },
    checkAuthentication(state) {
      if (state.isAuthenticated === true) {
        if (router.currentRoute.path === "/login") {
          router.push({ path: "/" });
        }
      } else {
        router.push({ path: "/login" });
      }
    },
    updateUser(state) {
      //to be run each time cart updates
      axios
        .get("/api/me", {
          headers: {
            Authorization: "Bearer " + state.access_token,
          },
        })
        .then((response) => {
          localStorage.setItem("user", JSON.stringify(response.data.data));
          state.user = response.data.data;
        })
        .catch((error) => {
          if (error.response.status === 401) {
            state.user = null;
            state.access_token = null;
            state.isAuthenticated = false;
            localStorage.clear();
            router.push({ path: "/" });
          }
        });
    },
    logoutUser(state) {
      axios.get("/api/logout", {
        headers: {
          Authorization: "Bearer " + state.access_token,
        },
      });
      state.user = null;
      state.access_token = null;
      state.isAuthenticated = false;
      localStorage.clear();
      router.push({ path: "/" });
    },
    setSelectedWard(state, ward) {
      state.selectedWard = ward || null;
    },
    setLogout(state) {
      state.user = null;
      state.access_token = null;
      state.isAuthenticated = false;
    },
  },
  actions: {
    async logout({ state, commit }) {
      return axios
        .get("/api/logout", {
          headers: {
            Authorization: "Bearer " + state.access_token,
          },
        })
        .then(() => {
          commit("setLogout");
        })
        .catch(({ response }) => {
          if (response.status == 401) commit("setLogout");
        });
    },
  },
};
export default auth;
