#!/usr/bin/env bash

npm run imagex

if [ "$APP_TYPE" == "driver" ]; then
  npm run makedriver
fi
if [ "$APP_TYPE" == "vendor" ]; then
  npm run makevendor
fi
if [ "$APP_TYPE" == "client" ]; then
  npm run makeclient
fi


if [ "$APP_PLATFORM" == "android" ]; then
  npm install react-native-rename -g
  npx react-native-rename "$APP_NAME" -b $APP_ID
fi




  