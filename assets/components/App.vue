<script>
  import onMounted from "vue";
  import computed from "vue";
  import { defineStore } from 'pinia'
  import Axios from 'axios'

  export default {
    store: defineStore({
      id: 'default',
      data: [
          // equipes: [],
          // joueurs: [],
          // ecussons: [],
          // message: "Hello Vue !",
          // counter: 0
          {
            "@id": "/api/equipes/1",
              "@type": "Equipe",
              "id": 1,
              "nom": "Paris St-Germain",
              "nbJoueur": 35,
              "ecusson": "/api/images/1"
          },
          {
            "@id": "/api/equipes/2",
              "@type": "Equipe",
              "id": 2,
              "nom": "Olympique de Marseille",
              "nbJoueur": 28,
              "ecusson": "/api/images/2"
          },
          {
            "@id": "/api/equipes/3",
              "@type": "Equipe",
              "id": 3,
              "nom": "OGC Nice",
              "nbJoueur": 27,
              "ecusson": "/api/images/3"
          },
          {
            "@id": "/api/equipes/4",
              "@type": "Equipe",
              "id": 4,
              "nom": "Rennes",
              "nbJoueur": 26,
              "ecusson": "/api/images/4"
          },
          {
            "@id": "/api/equipes/5",
              "@type": "Equipe",
              "id": 5,
              "nom": "RC Strasbourg",
              "nbJoueur": 24,
              "ecusson": "/api/images/5"
          },
          {
            "@id": "/api/equipes/6",
              "@type": "Equipe",
              "id": 6,
              "nom": "RC Lens",
              "nbJoueur": 25,
              "ecusson": "/api/images/6"
          },
          {
            "@id": "/api/equipes/7",
              "@type": "Equipe",
              "id": 7,
              "nom": "FC Nantes",
              "nbJoueur": 26,
              "ecusson": "/api/images/7"
          },
          {
            "@id": "/api/equipes/8",
              "@type": "Equipe",
              "id": 8,
              "nom": "LOSC Lille",
              "nbJoueur": 22,
              "ecusson": "/api/images/8"
          },
          {
            "@id": "/api/equipes/9",
              "@type": "Equipe",
              "id": 9,
              "nom": "AS Monaco",
              "nbJoueur": 28,
              "ecusson": "/api/images/9"
          },
          {
            "@id": "/api/equipes/10",
              "@type": "Equipe",
              "id": 10,
              "nom": "Olympique Lyonnais",
              "nbJoueur": 26,
              "ecusson": "/api/images/10"
          },
          {
            "@id": "/api/equipes/11",
              "@type": "Equipe",
              "id": 11,
              "nom": "Montpellier",
              "nbJoueur": 25,
              "ecusson": "/api/images/11"
          },
          {
            "@id": "/api/equipes/12",
              "@type": "Equipe",
              "id": 12,
              "nom": "Brest",
              "nbJoueur": 26,
              "ecusson": "/api/images/12"
          },
          {
            "@id": "/api/equipes/13",
              "@type": "Equipe",
              "id": 13,
              "nom": "Reims",
              "nbJoueur": 27,
              "ecusson": "/api/images/13"
          },
          {
            "@id": "/api/equipes/14",
              "@type": "Equipe",
              "id": 14,
              "nom": "SCO Angers",
              "nbJoueur": 25,
              "ecusson": "/api/images/14"
          },
          {
            "@id": "/api/equipes/15",
              "@type": "Equipe",
              "id": 15,
              "nom": "Clermont",
              "nbJoueur": 27,
              "ecusson": "/api/images/15"
          },
          {
            "@id": "/api/equipes/16",
              "@type": "Equipe",
              "id": 16,
              "nom": "FC Lorient",
              "nbJoueur": 27,
              "ecusson": "/api/images/16"
          },
          {
            "@id": "/api/equipes/17",
              "@type": "Equipe",
              "id": 17,
              "nom": "ESTAC Troyes",
              "nbJoueur": 32,
              "ecusson": "/api/images/17"
          },
          {
            "@id": "/api/equipes/18",
              "@type": "Equipe",
              "id": 18,
              "nom": "FC Metz",
              "nbJoueur": 29,
              "ecusson": "/api/images/18"
          },
          {
            "@id": "/api/equipes/19",
              "@type": "Equipe",
              "id": 19,
              "nom": "AS Saint-Etienne",
              "nbJoueur": 30,
              "ecusson": "/api/images/19"
          },
          {
            "@id": "/api/equipes/20",
              "@type": "Equipe",
              "id": 20,
              "nom": "Bordeaux",
              "nbJoueur": 30,
              "ecusson": "/api/images/20"
          }
        ]
      }),
      /*
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
      */
    // })
  }

  // this.store.getData();

  /*const equipes = computed(() => {
    return this.store.equipes;
  });

  const joueurs = computed(() => {
    return this.store.joueurs;
  });

  const ecussons = computed(() => {
    return this.store.ecussons;
  });*/

  // const msg   = this.store.message;
  // const count = this.store.counter;
  const equipes = computed(() => {
    return this.store.data;
  });

</script>

<template>
  <main>
<!--    <h1> {{ msg }} </h1>

    <button @click="counter++"> Click me {{ count }}</button>-->

    <!-- Affiche equipe -->

    <ul v-for="team in equipe">
      <li> {{team.nom}} </li>
    </ul>

  </main>
</template>

<style>

</style>