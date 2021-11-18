#!/bin/sh
echo 'ソースコードを差分アップロードします。'

rsync -auvz ../../crud_base_cake4 amaraimusi@amaraimusi.sakura.ne.jp:www/

echo "------------ 送信完了"
cmd /k