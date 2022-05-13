import { defineStore } from 'pinia'
import Axios from 'axios'

export const useDefaultStore = defineStore("api", {
    id: 'default',
    state: () => ({
        equipes: [],
        joueurs: [],
        ecussons: []
    }),
    getters: {

    },
    actions: {
        async getData() {
            try {
                //  EQUIPES
                await Axios.get('http://localhost:8000/api/equipes')
                    .then(response => { this.equipes = response.data["hydra:member"] });
                //  JOUEURS
                await Axios.get('http://localhost:8000/api/joueurs')
                    .then(response => { this.joueurs = response.data["hydra:member"] });
                //  Ecusson
                await Axios.get('http://localhost:8000/api/images')
                    .then(response => { this.ecussons = response.data["hydra:member"] });
            } catch (error) {
                alert(error);
            }

        }

    }
})