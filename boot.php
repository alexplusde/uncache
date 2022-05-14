<?php

# Seriously, why do you even think this could be a good idea and a solution to your problem?

uncache::purgeDir(rex_path::cache(), rex_config::get('uncache', 'seconds'));
