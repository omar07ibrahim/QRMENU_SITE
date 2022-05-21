import { StatusBar } from 'expo-status-bar';
import React, {useState} from "react";
import { Image } from "react-native";
import { StyleSheet, Text, View } from 'react-native';
import { AppLoading } from "expo";
import { useFonts } from '@use-expo/font';
import { Asset } from "expo-asset";
import { NavigationContainer } from "@react-navigation/native";
import AsyncStorage from '@react-native-async-storage/async-storage';

// Before rendering any navigation stack
import { enableScreens } from "react-native-screens";
enableScreens();

import { Block, GalioProvider } from "galio-framework";

import config from './config';


//App Screens
import Screens from './navigation/Screens';

import { Images, articles, argonTheme } from './constants';
import { SharedStateProvider } from './store/store';
import 'expo-asset';
import OneSignal from 'react-native-onesignal'; // Import package from node modules



// cache app images
const assetImages = [
  Images.Onboarding,
  Images.LogoOnboarding,
  Images.Logo,
  Images.Pro,
  Images.ArgonLogo,
  Images.iOSLogo,
  Images.androidLogo,
  Images.noData
];

// cache product images
articles.map(article => assetImages.push(article.image));

function cacheImages(images) {
  return images.map(image => {
    if (typeof image === 'string') {
      return Image.prefetch(image);
    } else {
      return Asset.fromModule(image).downloadAsync();
    }
  });
}

function myiOSPromptCallback(permission){
  // do something with permission value
}


export default class App extends React.Component {
  constructor(props) {
    super(props);
    this.onIds=this.onIds.bind(this);

    //Remove this method to stop OneSignal Debugging 
    OneSignal.setLogLevel(6, 0);
    
    // Replace 'YOUR_ONESIGNAL_APP_ID' with your OneSignal App ID.
    OneSignal.init(config.ONESIGNAL_APP_ID, {kOSSettingsKeyAutoPrompt : false, kOSSettingsKeyInAppLaunchURL: false, kOSSettingsKeyInFocusDisplayOption:2});
    OneSignal.inFocusDisplaying(2); // Controls what should happen if a notification is received while the app is open. 2 means that the notification will go directly to the device's notification center.
    
    // The promptForPushNotifications function code will show the iOS push notification prompt. We recommend removing the following code and instead using an In-App Message to prompt for notification permission (See step below)
    OneSignal.promptForPushNotificationsWithUserResponse(myiOSPromptCallback);

    OneSignal.addEventListener('received', this.onReceived);
    OneSignal.addEventListener('opened', this.onOpened);
    OneSignal.addEventListener('ids', this.onIds);
  }

  componentWillUnmount() {
    OneSignal.removeEventListener('received', this.onReceived);
    OneSignal.removeEventListener('opened', this.onOpened);
    OneSignal.removeEventListener('ids', this.onIds);
  }

  

  //Set external user id
  async setExternalUserId(device){
   
    var userJSON = await AsyncStorage.getItem('user',null);
    if (userJSON !== null) {
      var parsedUser=JSON.parse(userJSON)
    //alert(parsedUser.id);

      // OneSignal setExternalUserId
      OneSignal.setExternalUserId(parsedUser.id+"", (results) => {
        console.log('Results of setting external user id');
        console.log(results);
        //alert(JSON.stringify(results))
    });

     }
    
  }

  onReceived(notification) {
    console.log("Notification received: ", notification);
  }

  onOpened(openResult) {
    console.log('Message: ', openResult.notification.payload.body);
    console.log('Data: ', openResult.notification.payload.additionalData);
    console.log('isActive: ', openResult.notification.isAppInFocus);
    console.log('openResult: ', openResult);
  }

  onIds(device) {
    console.log('Device info: ', device);
    this.setExternalUserId(device);
  }



  render() {
      return (
        <NavigationContainer>
          <GalioProvider theme={argonTheme}>
            <SharedStateProvider>
              <Block flex>
                <Screens />
              </Block>
            </SharedStateProvider>
          </GalioProvider>
        </NavigationContainer>
        
      );
    
  }

  _loadResourcesAsync = async () => {
    return Promise.all([
      ...cacheImages(assetImages),
    ]);
  };

  _handleLoadingError = error => {
    // In this case, you might want to report the error to your error
    // reporting service, for example Sentry
    console.warn(error);
  };

  _handleFinishLoading = () => {
    this.setState({ isLoadingComplete: true });
  };

}