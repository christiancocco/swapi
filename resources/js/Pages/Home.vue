<!-- resources/js/Pages/Home.vue -->

<template>
  <div>
    <div class="container">
      <main>
        <div class="py-5 text-center">
          <h2>Test Christian Cocco Swapi Api</h2>
          <p class="lead">
            The Star Wars Christian Cocco API.<br>
          </p>
        </div>

        <div class="row g-5">
          <div class="col-md-12 col-lg-12">
            <h4 class="mb-3">Test API</h4>
            "Swapi package" is a simple package that provide the list of people and the information related to a planet accessible using the following APIs:
            <ul>
                <li>GET /api/people (Provide a paginated list of people, filterable and orderable)</li>
                <li>GET /api/people/{peopleId} (Provide selected people data including planet details)</li>
            </ul>
            If you want to filtering, ordering and paging /api/people result you can use this querystring parameter:
            <ul>
                <li>query: string to search in all people fields</li>
                <li>itemperpage: item per page (default value = 10)</li>
                <li>page: page number</li>
                <li>sort: sorting field</li>
                <li>sortVer: sorting versus (ASC: ascending - default value; DESC: descending)</li>
            </ul>
            Example: /api/people?query=fair&sort=name&sortVer=DESC&itemperpage=2&page=2
            <div class="row g-3">
              <div class="col-11">
                <div class="input-group has-validation">
                  <span class="input-group-text">/api</span>
                  <input
                    type="text"
                    class="form-control"
                    id="api"
                    :placeholder="default_api"
                    v-model="api"
                    required
                  />
                </div>
              </div>
            </div>
            <div class="row g-3">
              <div class="col-1">
                <button
                  class="btn btn-primary btn-lg"
                  type="button"
                  @click="update"
                >
                  Requestddd
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 well">
            <pre id="interactive_output" class="pre-scrollable">{{
              result
            }}</pre>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
        endpoint: "/api",
        default_api: "/people",
        api: "",
        result: "",
    };
  },
  mounted(){
      this.update();
  },
  methods: {
    /* Set the form */
    update() {
        var url = this.endpoint  + ((this.api) ?this.api:this.default_api);
        //console.log(this.endpoint  + ((this.api) ?this.api:this.default_api));
        var thisObj = this;
        axios.get(url)
            .then(response => {
                thisObj.result = response.data;
            });
    },
  },
};
</script>
