                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="#" class="btn-box big span4">
                                        <i class=" icon-random"></i><b>{{ $nb_band }}</b>
                                        <p class="text-muted">Band(s)</p>
                                    </a><a href="#" class="btn-box big span4">
                                        <i class="icon-user"></i><b>{{ $nb_user }}</b>
                                        <p class="text-muted">User(s)</p>
                                    </a>
                                    <a href="#" class="btn-box big span4">
                                        <i class="icon-money"></i><b>{{ number_format($sales_figures) }} F CFA</b>
                                        <p class="text-muted">Sales figures</p>
                                    </a>
                                </div>
                            </div>
                            <!--/#btn-controls-->
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                        Profit's Chart for 2020</h3>
                                </div>
                                <div class="module-body"> 
                                    <div id="chart" style="height: 300px;"></div>
                                </div>
                            </div>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->

        <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
        <!-- Chartisan -->
        <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
        <!-- Your application script -->
        <script>
        const chart = new Chartisan({
            el: '#chart',
            url: "@chart('performance_chart')",
             hooks: new ChartisanHooks()
                        .legend()
                        .colors()
                        .tooltip(),
        });
        </script>