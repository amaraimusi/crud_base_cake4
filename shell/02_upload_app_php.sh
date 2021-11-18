#!/bin/sh
echo 'app_local_p.php→本番 app_local.php'

rsync -auvz ../../crud_base_cake4/app/config/app_local_p.php amaraimusi@amaraimusi.sakura.ne.jp:www/crud_base_cake4/app/config/app_local.php

echo "------------ 送信完了"
#cmd /k