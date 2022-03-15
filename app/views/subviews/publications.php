<h2>Publications:</h2>
    <ol>
        <?php
            foreach($data as $publication) {
                $profile = $publication->getProfile($publication->profile_id);
                $user = $publication->getUser($profile->user_id);
                $username = $user->username;
                $timestamp = $publication->getTimestamp($publication->publication_id);

                echo "<li><a href = '/Publication/index/$publication->publication_id'>$publication->publication_title by $username at $timestamp</a></li>";
            }
        ?>
    </ol>