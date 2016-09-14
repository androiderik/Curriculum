            function tplawesome(e,t){res=e;for(var n=0;n<t.length;n++){res=res.replace(/\{\{(.*?)\}\}/g,function(e,r){return t[n][r]})}return res}
            // Your use of the YouTube API must comply with the Terms of Service:
            // https://developers.google.com/youtube/terms
            // Helper function to display JavaScript value on HTML page.
            function showResponse(response) {
            var responseString = JSON.stringify(response, '', 2);
            document.getElementById('response').innerHTML += responseString;

            }
            // Called automatically when JavaScript client library is loaded.
            function onClientLoad() {
            gapi.client.load('youtube', 'v3', onYouTubeApiLoad);
            }

            // Called automatically when YouTube API interface is loaded (see line 9).
            function onYouTubeApiLoad() {   
            // This API key is intended for use only in this lesson.
            // See https://goo.gl/PdPA1 to get a key for your own applications.
            gapi.client.setApiKey('AIzaSyD-ea664M3UzixpOIPsuvA1mJqQ9A4fVUg');
            search();
            }

            function search() {
            // Use the JavaScript client library to create a search.list() API call.
            var request = gapi.client.youtube.search.list({
            part: 'snippet,id',
            type:'video',
            channelId:'UCUr8omZ2ZlEueguv_R-b4QA',
            q:'Tecno Easy',
            maxResults:3
            });
            // Send the request to the API server,
            // and invoke onSearchResponse() with the response.
            request.execute(onSearchResponse);
            }
            // Called automatically with the response of the YouTube API request.

            function onSearchResponse(response) {
             // console.log(item)
             $("#response").html("");
            $.each(response.items, function (index, item)
            {
            $.get("js/res.html" , function(data)
            {
             $("#response").append(tplawesome(data, [{"title":item.snippet.title, "videoid":item.id.videoId}]));
              resetVideoHeight();
            });
            });
            $(window).on("resize", resetVideoHeight);
            }


            function  resetVideoHeight()
            {
              $(".video").css("height", $("#response").width() * 9/30);
            }














      