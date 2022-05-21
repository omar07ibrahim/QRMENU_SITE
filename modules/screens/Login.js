import React, { useContext,useState, useRef } from "react";
import {
  StyleSheet,
  ImageBackground,
  Dimensions,
  StatusBar,
  KeyboardAvoidingView,
  Image,
  Linking
} from "react-native";
import { Block, Text } from "galio-framework";
import config from '../config';
import { Button, Icon, Input } from "../components";
import { Images, argonTheme, Language } from "../constants";
import { TouchableOpacity } from "react-native-gesture-handler";
const { width, height } = Dimensions.get("screen");
import Toast from 'react-native-easy-toast'
import AuthContext from './../store/auth'


const Login = ({navigation}) => {
  const toastok = useRef(null);
  const toasterror = useRef(null);

  const { signIn } = useContext(AuthContext);
  const [email, setEmail ] = useState("");
  const [ password, setPassword ] = useState("");

  return (
    <Block flex middle>
        <StatusBar hidden />
        <ImageBackground
          source={Images.RegisterBackground}
          style={{ width, height, zIndex: 1 }}
        >
          <Block flex middle>
            <Block style={styles.registerContainer}>
              
              <Block flex>
                <Block flex={0.17} middle style={{marginTop:20}}>
                  <Image source={Images.food_tiger_logo} style={{width: (487/2),height: (144/2)}}/>
                  <Text muted></Text>
                </Block>
                <Block flex center>
                  <KeyboardAvoidingView
                    style={{ flex: 1 }}
                    behavior="padding"
                    enabled
                  >
                    
                    <Block width={width * 0.8} style={{ marginBottom: 15 }}>
                      <Input
                       value ={email}
                        borderless
                        onChangeText={text => setEmail(text)}
                        placeholder={"Email"}
                        iconContent={
                          <Icon
                            size={16}
                            color={argonTheme.COLORS.ICON}
                            name="ic_mail_24px"
                            family="ArgonExtra"
                            style={styles.inputIcons}
                          />
                        }
                      />
                    </Block>
                    
                   
                    <Block width={width * 0.8}>
                      <Input
                       value ={password}
                        password
                        borderles
                        placeholder={"Password"}
                        onChangeText={text => setPassword(text)}
                        iconContent={
                          <Icon
                            size={16}
                            color={argonTheme.COLORS.ICON}
                            name="padlock-unlocked"
                            family="ArgonExtra"
                            style={styles.inputIcons}
                          />
                        }
                      />
                      
                    </Block>








                    <Block row space="evenly" style={{marginVertical:10}} >
                      <Block>
                          <TouchableOpacity onPress={()=>  Linking.openURL(config.domain.replace("/api/v2",'')+"/password/reset").catch(err => console.error("Couldn't load page", err)) } >
                            <Text  size={14} color={argonTheme.COLORS.PRIMARY}>
                            {Language.forgotPassword}
                            </Text>
                          </TouchableOpacity>
                        </Block>
                      <Block>
                        <TouchableOpacity  onPress={()=> navigation.navigate('Register')} >
                          <Text  size={14} color={argonTheme.COLORS.PRIMARY}>
                            {Language.register}
                          </Text>
                        </TouchableOpacity>
                      </Block>
                      
                    </Block>

                    
                    
                    <Block middle>
                      <Button color="primary" style={styles.createButton} onPress={()=> signIn({email:email,password:password,toastok:toastok,toasterror:toasterror})}>
                        <Text bold size={14} color={argonTheme.COLORS.WHITE}>
                        {Language.login}
                        </Text>
                      </Button>
                    </Block>
                    
                  </KeyboardAvoidingView>
                </Block>
              </Block>
                        
              
            
            </Block>
          </Block>
        </ImageBackground>
        <Toast ref={toastok} style={{backgroundColor:argonTheme.COLORS.SUCCESS}}/>
        <Toast ref={toasterror} style={{backgroundColor:argonTheme.COLORS.ERROR}}/>
      </Block>
  );
};

export default Login;


const styles = StyleSheet.create({
  registerContainer: {
    width: width * 0.9,
    height: height * 0.78,
    backgroundColor: "#F4F5F7",
    borderRadius: 4,
    shadowColor: argonTheme.COLORS.BLACK,
    shadowOffset: {
      width: 0,
      height: 4
    },
    shadowRadius: 8,
    shadowOpacity: 0.1,
    elevation: 1,
    overflow: "hidden"
  },
  socialConnect: {
    backgroundColor: argonTheme.COLORS.WHITE,
    borderBottomWidth: StyleSheet.hairlineWidth,
    borderColor: "#8898AA"
  },
  socialButtons: {
    width: 120,
    height: 40,
    backgroundColor: "#fff",
    shadowColor: argonTheme.COLORS.BLACK,
    shadowOffset: {
      width: 0,
      height: 4
    },
    shadowRadius: 8,
    shadowOpacity: 0.1,
    elevation: 1
  },
  socialTextButtons: {
    color: argonTheme.COLORS.PRIMARY,
    fontWeight: "800",
    fontSize: 14
  },
  inputIcons: {
    marginRight: 12
  },
  passwordCheck: {
    paddingLeft: 15,
    paddingTop: 13,
    paddingBottom: 30
  },
  createButton: {
    width: width * 0.5,
    marginTop: 25
  }
});

