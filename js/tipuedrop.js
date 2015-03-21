
/*
Tipue drop 4.0
Copyright (c) 2014 Tipue
Tipue drop is released under the MIT License
http://www.tipue.com/drop
*/

(function($) {

     $.fn.tipuedrop = function(options) {

          var set = $.extend( {
          
               'show'                   : 3,       // How many results to show 
               'speed'                  : 300,     // How fast the results load
               'newWindow'              : false,   //Obsolete, will remove later
               'mode'                   : 'static', 
               'contentLocation'        : 'tipuedrop/tipuedrop_content.json' //This is where the Data comes from (as a JSON)
          
          }, options);
          
          return this.each(function() {
          
               var tipuedrop_in = {
                    pages: []
               };
               $.ajaxSetup({
                    async: false
               });                 
                              
               //Importing data via JSON
               if (set.mode == 'json')
               {
                    $.getJSON(set.contentLocation,
                         function(json)
                         {
                              tipuedrop_in = $.extend({}, json);
                         }
                    );
               }

               if (set.mode == 'static')
               {
                    tipuedrop_in = $.extend({}, tipuedrop);
               }

               $(this).keyup(function(event)
               {
                    getTipuedrop($(this));
               });               
               

               //Show the dropdown suggested search options
               function getTipuedrop($obj)
               {
                    if ($obj.val())
                    {
                         var c = 0;
                         for (var i = 0; i < tipuedrop_in.pages.length; i++)
                         {
                              var pat = new RegExp($obj.val(), 'i');
                              if ((tipuedrop_in.pages[i].title.search(pat) != -1 || tipuedrop_in.pages[i].text.search(pat) != -1 || tipuedrop_in.pages[i].tags.search(pat) != -1) && c < set.show)
                              {
                                   //Generate HTML for each one
                                   if (c == 0)
                                   {
                                        var out = '<div id="tipue_drop_wrapper"><div class="tipue_drop_head"><div id="tipue_drop_head_text">Suggested results</div></div>';    
                                   }
                                   out += '<a class="' + i + '">';
                                   out += '<div class="tipue_drop_item"><div class="tipue_drop_left">' + '</div><div class="tipue_drop_right"><div class="tipue_drop_right_title">' + tipuedrop_in.pages[i].title + '</div><div class="tipue_drop_right_text">' + tipuedrop_in.pages[i].text + '</div></div></div></div>';
                                   c++;
                              }
                         }

                         if (c != 0)
                         {
                              //Show the search content
                              out += '</div>';               
                              $('#tipue_drop_content').html(out); //Render the HTML
                              $('#tipue_drop_content').fadeIn(set.speed); //Fade-in
                         }
                         
                         $('a').click(function()
                         {
                              console.log();
                              var x = Math.floor($(this).attr("class"));
                              var dest = tipuedrop_in.pages[x].loc;
                              L.marker(dest).addTo(map);
                              map.setView(dest, 13);
                         });
                    }
                    else
                    {
                         // Fade out if nothing is typed
                         $('#tipue_drop_content').fadeOut(set.speed);
                    }  
               }
               
               $('html').click(function()
               {
                    $('#tipue_drop_content').fadeOut(set.speed);
               });
          
          });
     };
     
})(jQuery);
