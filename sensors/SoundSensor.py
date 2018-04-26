class SoundSensor:
    def __init__(self, gate, envelope, audio):
        self.gate = gate
        self.envelope = envelope
        self.audio = audio

    def get_gate(self):
        return self.gate
    def get_envelope(self):
        return self.envelope
    def get_audio(self):
        return self.audio
