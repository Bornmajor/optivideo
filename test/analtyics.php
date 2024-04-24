<script type="module">
      
      const cloudinary = new Cloudinary({
      cloud_name: 'dx8t5kvns', // Replace with your Cloudinary cloud name
      api_key: '882463312224961',  // Replace with your Cloudinary API key
      api_secret: 'PQ_hYp8kQkpv2-j653EJBWKcyZQ' // Replace with your Cloudinary API secret
      });

      const publicId = '<?php echo $video_public_id ?>'; // Replace with the actual Public ID

      const searchApi = new cloudinary.SearchApi(cloudinary);

      searchApi.expression(`resource_type:video AND public_id:${publicId}`)
      .sortBy('public_id', 'desc')
      .maxResults(1)
      .execute()
      .then(response => {
          const analyticsContainer = document.getElementById('analytics-container');
          if (response.resources && response.resources.length > 0) {
          const video = response.resources[0];

          // Build HTML to display analytics data
          let analyticsHtml = `<h2>Video Analytics for "${video.public_id}"</h2>`;
          analyticsHtml += `<ul>`;
          analyticsHtml += `<li><b>Total Views:</b> ${video.analytics.view.total}</li>`;
          analyticsHtml += `<li><b>Unique Views:</b> ${video.analytics.view.unique}</li>`;
          analyticsHtml += `<li><b>Started Plays:</b> ${video.analytics.play.started}</li>`;
          analyticsHtml += `<li><b>Finished Plays:</b> ${video.analytics.play.finished}</li>`;
          analyticsHtml += `<li><b>Average Duration:</b> ${video.analytics.engagement.average_duration.toFixed(2)} seconds</li>`;
          // Add more analytics data as needed
          analyticsHtml += `</ul>`;

          analyticsContainer.innerHTML = analyticsHtml;
          } else {
          analyticsContainer.textContent = "No video found with the specified Public ID.";
          }
      })
      .catch(error => {
          console.error("Error fetching video analytics:", error);
          analyticsContainer.textContent = "An error occurred while fetching analytics.";
      });
  </script>
      

      
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/cloudinary-core/2.3.0/cloudinary-core-shrinkwrap.js"></script>
  <script type="text/javascript" src="https://unpkg.com/cloudinary-video-player/dist/cld-video-player.js"></script>

            <script>
                const player = cloudinary.videoPlayer('player', {
                cloudName: 'dx8t5kvns',
                fluid: true,
                controls: true,
                colors: {
                    base: '#f6b417',
                    accent: '#e5a309'
                },
                logoImageUrl: 'https://res.cloudinary.com/dx8t5kvns/image/upload/v1710524612/y66ifb4hppkzcakrhsnu.png'
                });

                player.source('kmvjczwjzijspgonlty3', {
                poster: 'https://res.cloudinary.com/dx8t5kvns/image/upload/zdnusdavtjzjg8zxvuwy.jpg',
                sourceTypes: ['dash']
                });
            </script> -->