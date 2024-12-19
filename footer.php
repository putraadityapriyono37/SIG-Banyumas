        </div>
        </div>

        <!-- JavaScript -->
        <script>
            // Function to toggle sidebar visibility
            function toggleSidebar() {
                const sidebar = document.querySelector('.sidebar');
                const content = document.querySelector('.content');
                sidebar.classList.toggle('show');
                content.style.marginLeft = sidebar.classList.contains('show') ? '0' : '250px';
            }

            function updateTime() {
                const currentTime = new Date();
                const options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: true
                };

                // Format the time in Indonesian locale
                let formattedTime = currentTime.toLocaleString('id-ID', options);

                // Replace "pukul" with "-"
                formattedTime = formattedTime.replace("pukul", "-");

                // Update the element with the formatted time
                document.getElementById('current-time').textContent = formattedTime;
            }

            // Call the updateTime function every second
            setInterval(updateTime, 1000);
            updateTime();
        </script>
        </body>

        </html>