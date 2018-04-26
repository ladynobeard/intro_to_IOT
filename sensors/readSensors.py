#!/usr/bin/python
import sys
import time

import Adafruit_DHT
from SoundSensor import SoundSensor
from MCP3008ADC import MCP3008ADC
import RPi.GPIO as GPIO

import pymongo
from datetime import datetime
from pytz import timezone

####### Variables #######
duration = 60*60 #Representing one hour

#DHT Pins
sensorDHT   = 22
pinDHT      = 26

# Sound Sensor Pins and Declarations
pinGate     = 21
pinEnvelope = 1
pinAudio    = 0

GPIO.setmode(GPIO.BCM)
GPIO.setup(pinGate, GPIO.IN)

myMCP = MCP3008ADC()
mySoundSensor = SoundSensor(pinGate, pinEnvelope, pinAudio)

######### Connect to MongoDB and grab collections #########

connection = pymongo.MongoClient("mongodb://admin:admin@ds157089.mlab.com:57089/andys_ambilamp")
db = connection.andys_ambilamp
sounds = db.sound
humidities = db.hum
temperatures = db.temp

num_entries = sounds.count()

########## DHTS  ################

while 1:
    dto = datetime.now(timezone('UTC')) # Take a time stamp

    dto_pacific = dto.astimezone(timezone('US/Pacific'))
    dts = datetime.strftime(dto_pacific,"%Y-%m-%d %H:%M:%S") #.localize(dto)
    
    humidity, temperature = Adafruit_DHT.read_retry(sensorDHT, pinDHT)
    temperature = temperature * 9/5.0 + 32 # Convert the temperature to Fahrenheit. 

    gateVal = GPIO.input(mySoundSensor.get_gate())
    envelopeVal = myMCP.read(mySoundSensor.get_envelope())
    audioVal = myMCP.read(mySoundSensor.get_audio())
    
    if humidity is not None and temperature is not None:
        num_entries = num_entries + 1

        humidity_entry = {'time':dts, 'val':humidity, 'entry':num_entries}
        humidities.insert_one(humidity_entry)
        
        temperature_entry = {'time':dts, 'val':temperature, 'entry':num_entries}
        temperatures.insert_one(temperature_entry)

        sound_entry = {'time':dts, 'gate':gateVal, 'envelope':envelopeVal, 'audio':audioVal, 'entry':num_entries}
        sounds.insert_one(sound_entry)
       
        time.sleep(duration) #Sleep until it is time for the next reading. 

######### End DHTS  #######
