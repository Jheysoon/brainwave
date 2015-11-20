                      $(document).ready(function()
                                    {
                                      $('#search').keyup(function()
                                      {
                                        searchTable($(this).val());
                                      });
                                    });

                                    function searchTable(inputVal)
                                    {
                                      var table = $('#tblData');
                                      table.find('tr').each(function(index, row)
                                      {
                                        var allCells = $(row).find('td');
                                        if(allCells.length > 0)
                                        {
                                          var found = false;
                                          allCells.each(function(index, td)
                                          {
                                            var regExp = new RegExp(inputVal, 'i');
                                            if(regExp.test($(td).text()))
                                            {
                                              found = true;
                                              return false;
                                            }
                                          });
                                          if(found == true)$(row).show();else $(row).hide();
                                        }
                                      });
                                    }

                    $(document).ready(function() {
                         $("#tblData").change(function() {
                        //change the selector to class cheese children
                        $(".cheese td").each(function() {
                          if ($(this).text() != $("#filter").val()) {
                            $(this).parent().hide();
                            //hide next tr(which is the one with class cracker)
                            //when doesn't match
                            $(this).parent().next().hide();
                          } else {
                            //show next tr(which is the one with class cracker)
                            //when match
                            $(this).parent().show();
                            $(this).parent().next().show();
                          }
                          if ($("#filter").val() == "ALL") {     
                            $(this).parent().show();
                            //add this to show all filter to include cracker class too
                            $(this).parent().next().show();
                          }

                        });
                      });
                    });

        $("#sel").click(function() {
            $("#tblData tbody tr").show();
            if($("#sel").val.length > 0) {
                $("#sel tbody tr").filter(function(index, elm) {
                    return $(elm).html().toUpperCase().indexOf($("#sel").val().toUpperCase()) < 0;
                }).hide();
            }
        });




                  